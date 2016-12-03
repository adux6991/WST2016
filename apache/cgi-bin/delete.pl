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

# Produce the header for the reply page - do it here so
#  error messages appear on the page

print header();

# Set names for file locking and unlocking

$LOCK = 2;
$UNLOCK = 8;


# Begin main program
# Get the form values

open(FIN, "<unit3.txt") or error();
flock(FIN, $LOCK);
@file_lines = <FIN>;
flock(FIN, $UNLOCK);
close(FIN);

$ON = "on";
for ($i = 0, $j = 0; $i < @file_lines; $i++)
{
    if (param("$i") ne $ON)
    {
        $new[$j] = $file_lines[$i];
        $j++;
    }
}

# Open the data file for writing and lock it

open(FOUT, ">unit3.txt") or error();
flock(FOUT, $LOCK);

foreach $item (@new)
{
    print FOUT $item;
}

flock(FOUT, $UNLOCK);
close(FOUT);


# Build the Web page to thank the survey participant
print '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="Xu Da">
<title> Questionaire </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/main.css">
</head>
<body>

<div class = "head">
<h1><b> Questionaire Results </b></h1>
</div>

<div class = "block head">
<br/>
<h3> Successfully deleted! </h3>
<br/>
</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "/unit3_2.html"> Return </a></p>
    </div>
</div>

</body>
</html>
';