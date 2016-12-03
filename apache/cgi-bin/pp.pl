#!/usr/bin/perl -w
# delete.pl
# This CGI program deletes items in the questionaire

use CGI ":standard";

# error Ð a function to produce an error message for the client
#         and exit in case of open errors

sub error {
    print "Error file could not be opened in submmit.pl <br/>";
    print end_html();
    exit(1);
}

$LOCK = 2;
$UNLOCK = 8;


open(FIN, "<data.txt") or error();
flock(FIN, $LOCK);
@file_lines = <FIN>;
flock(FIN, $UNLOCK);

for ($i = 0, $j = 0; $i < @file_lines; $i++)
{
        $new[$j] = $file_lines[$i];
        $j++;
}

# Open the data file for writing and lock it

open(FOUT, ">output.txt") or error();
flock(FOUT, $LOCK);

for ($j = 0; $j < @new; $j++)
{
    print FOUT "$new[$j]\n";
}


flock(FOUT, $UNLOCK);
close(FOUT);
close(FIN);

# Build the Web page to thank the survey participant
print start_html("Successfully deleted");
print "Successfully deleted! <br/>\n";
print end_html();
