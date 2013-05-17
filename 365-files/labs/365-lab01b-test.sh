#!/bin/sh

correctCounts=(2 2 1 1 1 5 5 8 8 8 13 2 1)
outFile=.__eriq__test_file_121

./schoolsearch > $outFile << EOF
C: 104
Classroom: 104
S: SCHOENECKER
Student: SCHOENECKER
S: SCHOENECKER B
Teacher: GAMBREL
T: GAMBREL
Bus: 52
B: 52
B: 0
G: 2
Grade: 2 Teacher
C: 104 T
Quit
EOF

# Get the number of results for each operation.
resultCounts=( )
count=0
#for line in $(cat $outFile); do
while read line; do
   if [[ $line =~ ^[0-9][0-9]*ms$ ]] ; then
      resultCounts+=(${count})
      count=0
   else
      count=$(($count + 1))
   fi
done < $outFile

error=0

size=$((${#correctCounts[@]}))
if [ ${#correctCounts[@]} -eq ${#resultCounts[@]} ] ; then
   for ((i = 0; i < $size; i++)); do
      if [ ${correctCounts[$i]} -ne ${resultCounts[$i]} ] ; then
         echo "ERROR: Operation #${i} produces an incorrect number of results."
         echo "       Expects ${correctCounts[$i]} results, but produces ${resultCounts[$i]} results."
         error=1
      fi
   done
else
   echo "ERROR: Different number of operations found."
   echo "       Expected: ${#correctCounts[@]}, found: ${#resultCounts[@]}."
   echo "       This could be because of a program crash or imporper formatting."
   echo "       Review the output formatting in the lab."
   echo "       Make sure that there is NO prompt, and that the time is outputed as '<number>ms'."
   error=1
fi

echo "-----"
if [ $error -eq 1 ] ; then
   echo "Errors detected, fix them then try again."
else
   echo "Congrats! No errors detected."
fi

rm -f $outFile
