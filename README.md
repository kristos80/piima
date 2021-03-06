[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=security_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=bugs)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![CodeScene Code Health](https://codescene.io/projects/15605/status-badges/code-health)](https://codescene.io/projects/15605) 
[![CodeScene System Mastery](https://codescene.io/projects/15605/status-badges/system-mastery)](https://codescene.io/projects/15605)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ba43186b78cd43729692f233847a7d4d)](https://app.codacy.com/gh/kristos80/piima?utm_source=github.com&utm_medium=referral&utm_content=kristos80/piima&utm_campaign=Badge_Grade_Settings)

# Piima
A, really, simple utility for working with PDF files.  
   
For now it can do 2 distinct things (see public methods):

1. Convert any page of a PDF file to an image
2. Calculate the total pages of a PDF file

## Dependencies
The package is dependent on `ghostscript` 

## Public methods

#### public static extractImage(string $pdf, string $image, int $page = 1, bool $silent = FALSE) : bool
```PHP
// Creates an image from the first page of the pdf file 
// and returns `TRUE` or FALSE or throws an exception 
$thumbnailCreated = Piima::extractImage($pdf, $image);

// Creates an image from the 5th page of the pdf file 
// and returns `TRUE` or FALSE or throws an exception 
$thumbnailCreated = Piima::extractImage($pdf, $image, 5);

// Creates an image from the 5th page of the pdf file 
// and returns `TRUE` or `FALSE` without throwing an exception
$thumbnailCreated = Piima::extractImage($pdf, $image, 5, TRUE);
```

#### public static calculateTotalPages(string $pdf, bool $silent = FALSE): int
```PHP
// Calculates total page of PDF file as an integer
// and returns it or throws an exception
Piima::calculateTotalPages($pdf);

// Calculates total page of PDF file as an integer
// and returns it without throwing an exception
Piima::calculateTotalPages($pdf, TRUE);
```
