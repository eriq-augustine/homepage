/**
 * This implementation is a sample of the structure you will follow for all
 * of the SUnit tests you write this quarter.
 *
 * @author Kurt Mammen
 * @version 01/23/2014 - Initial revision.
 */
public class SampleTest
{
   // This value represents the epsilon value to use with the following method:
   //
   //    SUnit.assertEquals(double expect, double actual, double espilon)
   //
   // The correct value to use is problem-specific so be sure to change it
   // as necessary.
   private static final double E = 0.000001;

   /**
    * Calls all test methods - place all of your tests or, better yet, all of
    * your calls to methods that contain the tests here. Placing all of the
    * tests in a method other than main allows different programs to make use
    * of the tests.
    */
   public static void testAll()
   {
      // Place all of your tests here. The best practice is to call separate
      // test methods from here rather than writing the actual tests here.
      testSampleMethod();  
   }

   /**
    * Sample test method to use as a model for you actual test methods - be
    * sure to choose meaningful names to make your code readable!
    */
   public static void testSampleMethod()
   {
      // This is where you would develop test inputs, call the method being
      // tested, and use the SUnit methods to verify the results.
   }

   /**
    * DO NOT MODIFY THIS METHOD! Calls testAll to run all tests and report
    * the number of tests that were run and how many failed. Not putting
    * the tests in main allows them to be run by another program if and
    * when desired.
    * 
    * @param args Any arguments specified when the program was run.
    */
   public static void main(String[] args)
   {
      // Run all the tests...
      testAll();

      // Display number of tests run and how many failed...
      System.out.println("SUnit: "
                       + SUnit.testsRun() + " tests run, "
                       + SUnit.testsFailed() + " tests failed");
   }
}
