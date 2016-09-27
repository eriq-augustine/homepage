/**
 *  @author Eriq Augustine 
 */

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <math.h>

int
main()
{
   FILE* inFile;
   FILE* outFile;
   int in = 0;

   inFile = fopen("test.txt", "r");
   outFile = fopen("test.out", "w");

   while (in != EOF)
   {
      in = fgetc(inFile);

      if (in != EOF)
      {
         fprintf(outFile, "%c", in);
      }
   }

   fclose(inFile);
   fclose(outFile);

   return EXIT_SUCCESS;
}
