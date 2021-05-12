[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=security_rating)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=kristos80_piima&metric=bugs)](https://sonarcloud.io/dashboard?id=kristos80_piima)
[![CodeScene Code Health](https://codescene.io/projects/15605/status-badges/code-health)](https://codescene.io/projects/15605) 
[![CodeScene System Mastery](https://codescene.io/projects/15605/status-badges/system-mastery)](https://codescene.io/projects/15605)

# Piima
A, really, simple utility for working with PDF files

## Dependencies
The package is dependent on `ghostscript` 

## Public methods

#### extractImage(string $pdf, string $image, int $page = 1, bool $silent = FALSE) : bool
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

#### calculateTotalPages(string $pdf, bool $silent = FALSE): int
```PHP
// Calculates total page of PDF file as an integer
// and returns it or throws an exception
Piima::calculateTotalPages($pdf);

// Calculates total page of PDF file as an integer
// and returns it without throwing an exception
Piima::calculateTotalPages($pdf, TRUE);
```
