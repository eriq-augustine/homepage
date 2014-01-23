/**
 *  @author Eric Augustine
 *  Show proper (Foo) and improper (Baz) typedefs.
 */

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <math.h>

// This is a bad typedef.
// This will not work in all situations.
typedef struct {
   int a;
} Baz;

// This is the proper way to typedef.
typedef struct Foo {
   int a;
} Foo;

int main(int argc, char *argv[])
{
   Foo bar = {1};
   struct Foo bar2 = {1};

   Baz bar3 = {1};
   // Can't to this, get a compile error because improperly typedef'd.
   // struct Baz bar4 = {1};

   return EXIT_SUCCESS;
}
