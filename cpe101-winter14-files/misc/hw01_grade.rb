CLASS_NAME = 'CPE 101 Winter 2014'
ASSIGNMENT = 'Assignment 1'

NOTE = "This assignment has been automatically graded.\nIf you see any mistakes, don't panic. Just email/talk to me."

BASE_DIR = File.absolute_path(File.dirname(__FILE__))
HANDIN_DIR = "#{BASE_DIR}/handin"
CHECKIT_SOURCE = "#{BASE_DIR}/checkit.h"
COMPILE_OUT_DIR = "#{BASE_DIR}/compileOutput"
RUN_OUT_DIR = "#{BASE_DIR}/runOutput"
GRADESHEETS_DIR = "#{BASE_DIR}/gradesheets"

TEST_DRIVER_BASENAME = 'eriq_test.c'
TEST_DRIVER = "#{BASE_DIR}/#{TEST_DRIVER_BASENAME}"

REQUIRED_FILES = ['data.h', 'data.c', 'test.c']
STRUCT_NAMES = ['point', 'vector', 'ray', 'sphere']
FIELD_NAMES = [['point', ['x', 'y', 'z']],
               ['vector', ['x', 'y', 'z']],
               ['ray', ['p', 'dir']],
               ['sphere', ['center', 'radius']]]

# Don't bother trying to match types and names, just check if it exists.
FIELD_TYPES = [['point', ['double', 'double', 'double']],
               ['vector', ['double', 'double', 'double']],
               ['ray', ["struct point", "struct vector"]],
               ['sphere', ["struct point", 'double']]]

# Get raw file contents, but clean somethings up and remove newlines so
#  we can regex it easily.
def getRawFileContents(path)
   rtn = ''

   begin
      file = File.open(path, 'r')
      file.each{|line|
         rtn += line.strip() + ' '
      }
   rescue
      return ''
   end

   return rtn
end

def getStructContent(rawContent, structName)
   if (match = rawContent.match(/struct\s+#{structName}\s*{([^}]*)}/) ||
       match = rawContent.match(/typedef\s+struct\s*{([^}]*)}\s*#{structName}/))
      return match[1]
   end

   return ''
end

def checkFilenames(studentDir)
   rtn = []

   REQUIRED_FILES.each{|requiredFile|
      if (!File.exists?("#{studentDir}/#{requiredFile}"))
         rtn << ["Required file #{requiredFile} does not exist.", 5]
      end
   }

   return rtn
end

def checkStructNames(studentDir)
   rtn = []

   content = getRawFileContents("#{studentDir}/data.h")
   STRUCT_NAMES.each{|structName|
      if (!content.match(/struct\s+#{structName}\s*{/) &&
          !content.match(/typedef\s+struct\s*{[^}]+}\s*#{structName}/))
         rtn << ["Required struct (#{structName}) does not exist.", 5]
      end
   }

   return rtn
end

# |contentInfo| should be formed like FIELD_NAMES.
def checkStructForContent(studentDir, contentInfo, shortName)
   rtn = []

   content = getRawFileContents("#{studentDir}/data.h")
   contentInfo.each{|fieldInfo|
      structContent = getStructContent(content, fieldInfo[0])

      if (structContent == '')
         print "Unable to get struct content (#{studentDir}, #{fieldInfo[0]}"
         next
      end

      fieldInfo[1].each{|field|
         if (!structContent.match(/\b#{field}\b/))
            rtn << ["Struct #{fieldInfo[0]} does not have #{shortName} #{field}.", 5]
         end
      }
   }

   return rtn
end

def checkFieldNames(studentDir)
   return checkStructForContent(studentDir, FIELD_NAMES, 'field')
end

def checkFieldTypes(studentDir)
   return checkStructForContent(studentDir, FIELD_TYPES, 'type')
end

def checkCreateFuns(studentDir)
   rtn = []

   content = getRawFileContents("#{studentDir}/data.h")

   # Use the field types to construct the creation headers.
   FIELD_TYPES.each{|fieldInfo|
      funHeader = "struct\\s+#{fieldInfo[0]}\\s+create_#{fieldInfo[0]}\\s*\\("

      fieldInfo[1].each{|fieldType|
         funHeader += "\\s*#{fieldType.sub(/\s+/, "\\s+")}\\s*\\w*\\s*,"
      }
      funHeader.sub!(/,$/, "\\)")

      if (!content.match(/#{funHeader}/))
         rtn << ["Required function prototype for (create_#{fieldInfo[0]}) does not exist.", 5]
      end
   }

   return rtn
end

def runAndCheckit(studentDir, studentName, runId, binName = 'a.out', suffix = '')
   rtn = []

   `cd #{studentDir} ; ./#{binName} | grep "Test FAILED" > #{RUN_OUT_DIR}/#{studentName}#{suffix}.txt`

   file = File.open("#{RUN_OUT_DIR}/#{studentName}#{suffix}.txt", 'r')
   file.each{|line|
      rtn << ["(#{runId}) #{line.strip()}", 5]
   }

   return rtn
end

def checkCompileAndRunInternal(studentDir, studentName)
   rtn = []

   `cd #{studentDir} && gcc -std=c99 -Wall -pedantic -lm *.c 2> #{COMPILE_OUT_DIR}/#{studentName}.txt`

   if ($?.to_i() != 0)
      puts "#{studentName} failed to compile. Grade manually."
      return [['Given code failed to compile. See compilation output section.', 30]]
   end

   rtn += runAndCheckit(studentDir, studentName, 'Your Test', 'a.out')

   `cp #{TEST_DRIVER} #{studentDir}/ && cd #{studentDir} && gcc -std=c99 -Wall -pedantic -lm data.c #{TEST_DRIVER_BASENAME} 2> #{COMPILE_OUT_DIR}/#{studentName}_test.txt`

   if ($?.to_i() != 0)
      puts "#{studentName} failed to compile test. Grade manually."
      rtn << ['Failed to compile test cases. See compilation output section.', 20]
      return rtn
   end

   rtn += runAndCheckit(studentDir, studentName, 'My Test', 'a.out', '_test')

   return rtn
end

def checkCompileAndRun(studentDir, studentName)
   `cp #{CHECKIT_SOURCE} #{studentDir}/`

   rtn = checkCompileAndRunInternal(studentDir, studentName)

   `rm -f #{studentDir}/#{TEST_DRIVER_BASENAME}`

   return rtn
end

def writeGradesheet(studentName, deductions)
   if (deductions.length() > 0)
      deductionTotal = deductions.collect{|val| val[1]}.inject(:+)
   else
      deductionTotal = 0
   end

   gradeFile = File.new("#{GRADESHEETS_DIR}/#{studentName}.gradesheet", 'w')

   gradeFile.puts(CLASS_NAME)
   gradeFile.puts("Gradesheet for #{studentName} #{ASSIGNMENT}")
   gradeFile.puts()

   if (NOTE != '')
      gradeFile.puts(NOTE)
      gradeFile.puts()
   end

   gradeFile.puts("Total: #{100 - deductionTotal} / 100")
   gradeFile.puts()

   gradeFile.puts("Deductions:")
   deductions.each{|deduction|
      gradeFile.puts("   -#{deduction[1]} -- #{deduction[0]}")
   }
   gradeFile.puts()

   gradeFile.puts("Compile Output:")
   if (File.exists?("#{COMPILE_OUT_DIR}/#{studentName}.txt"))
      compileFile = File.open("#{COMPILE_OUT_DIR}/#{studentName}.txt", 'r')
      compileOut = compileFile.read()
      compileFile.close()
      gradeFile.puts(compileOut.sub("\n", "\n   "))
   else
      gradeFile.puts()
   end

   gradeFile.puts("Test Compile Output:")
   if (File.exists?("#{COMPILE_OUT_DIR}/#{studentName}_test.txt"))
      compileFile = File.open("#{COMPILE_OUT_DIR}/#{studentName}_test.txt", 'r')
      compileOut = compileFile.read()
      compileFile.close()
      gradeFile.puts(compileOut.sub("\n", "\n   "))
   else
      gradeFile.puts()
   end

   gradeFile.close()
end

deductions = {}

Dir.foreach(HANDIN_DIR) {|student|
   if (student.start_with?('.'))
      next
   end

   studentDir = "#{HANDIN_DIR}/#{student}"

   deductions[student] = []
   deductions[student] += checkFilenames(studentDir)
   deductions[student] += checkStructNames(studentDir)
   deductions[student] += checkFieldNames(studentDir)
   deductions[student] += checkFieldTypes(studentDir)
   deductions[student] += checkCreateFuns(studentDir)
   deductions[student] += checkCompileAndRun(studentDir, student)

   writeGradesheet(student, deductions[student])
}
