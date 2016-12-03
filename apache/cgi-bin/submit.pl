#!/usr/bin/perl -w
# submmit.pl
# This CGI program processes and stores the information in the questionaire

use CGI ":standard";

# error Ð a function to produce an error message for the client
#         and exit in case of open errors

sub error {
    print "Error file could not be opened in submmit.pl <br/>";
    print end_html();
    exit(1);
}

# Begin main program
# Get the form values

my($name, $age, $gender, $email) = (param("name"), param("age"), param("gender"), param("email"));

# Produce the header for the reply page - do it here so
#  error messages appear on the page

print header();

# Set names for file locking and unlocking

$LOCK = 2;
$UNLOCK = 8;

# Open the data file for writing and lock it

open(FOUT, ">>unit3.txt") or error();
flock(FOUT, $LOCK);
print FOUT "$name $age $gender $email\n";
flock(FOUT, $UNLOCK);
close(FOUT);