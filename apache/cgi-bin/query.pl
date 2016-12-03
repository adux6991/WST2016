#!/usr/bin/perl -w
# query.pl
# This CGI program shows all collected data and provide delete options

use CGI ":standard";

# error Ð a function to produce an error message for the client
#         and exit in case of open errors

sub error {
    print "Error file could not be opened in query.pl <br/>";
    print end_html();
    exit(1);
}

# Produce the header for the reply page - do it here so
#  error messages appear on the page

print header();

# Set names for file locking and unlocking

$LOCK = 2;
$UNLOCK = 8;

# Open and lock the survey data file

open(FIN, "<unit3.txt") or error();
flock(FIN, $LOCK);
@file_lines = <FIN>;
flock(FIN, $UNLOCK);
close(FIN);

print start_html(-title=>"Questionaire", -author=>"Xu Da", -lang=>"en", -meta=>{"charset"=>"UTF-8"},
    -head=>[
    Link({-rel=>'stylesheet', -href=>'https://fonts.googleapis.com/css?family=Raleway'}),
    Link({-rel=>'stylesheet', -href=>'/main.css'})
    ]
    );

print '
<div class = "head">
    <h1><b> Questionaire Results </b></h1>
</div>
<div class = "block">
';

print start_form(-action=>"/cgi-bin/delete.pl", -method=>"post");

print br();
print br();
print br();

print "<table border = '0' align = 'center'>\n";

print Tr(
    th(''),
    th('Name'),
    th('Age'),
    th('Gender'),
    th('Email')
    );

for ($i = 0; $i < @file_lines; $i++)
{
    $line = $file_lines[$i];
    chomp($line);
    @items = split / /, $line;
    print  Tr(
              td(checkbox(-name=>"$i", -value=>"on", -label=>"")),
              td($items[0]),
              td($items[1]),
              td($items[2]),
              td($items[3]),
           );
    print "\n";
}

print Tr(
    td({-colspan=>"5"},submit(-name=>"Delete", -value=>"Delete"))
    );

print "</table>\n";

print br();
print br();
print br();

print end_form();

print '
</div>
<div class = "block foot">
    <div class = "head">
        <p><a href = "/unit3_2.html"> Return </a></p>
    </div>
</div>
';

print end_html();

