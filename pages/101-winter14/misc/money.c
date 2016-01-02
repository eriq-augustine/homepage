/**
 *  @author Eric Augustine
 *  An example of why you should not use floating point numbers for money.
 *  The numbers are a bit contrived, but this is just one of many holes in the
 *  the numeric reresentation for floating point numbers.
 */

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <math.h>

int main(int argc, char *argv[]) {
   double y = 1e11F;

   printf("You started with 1e11F (100000000000.00)\n");
   printf("Your balance is %.2f\n", y);

   if (y < 99999999999.00) {
      printf("You lost: %.2f\n", 99999999999.00 - y + 1);
   }

   return EXIT_SUCCESS;
}
