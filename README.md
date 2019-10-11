# PHP - Phrase Analyser

| Stack | Version |
|--|--|
| PHP |7.2 |

## What does this helper do?
Just a simple helper to convert a text to array, where it is possible to identify the occurrence of the letters used, informing how many appear before, after and the total of occurrences.

The phrase "football vs soccer" will return:
````
Array
(
    [f] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => none
                )
            [after] => Array
                (
                    [0] => o
                )
            [distance] => N/A
        )
    [o] => Array
        (
            [occurrences] => 3
            [before] => Array
                (
                    [0] => f
                    [1] => o
                    [2] => s
                )
            [after] => Array
                (
                    [0] => o
                    [1] => t
                    [2] => c
                )
            [distance] => 10
        )
    [t] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => o
                )
            [after] => Array
                (
                    [0] => b
                )
            [distance] => N/A
        )
    [b] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => t
                )

            [after] => Array
                (
                    [0] => a
                )

            [distance] => N/A
        )
    [a] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => b
                )
            [after] => Array
                (
                    [0] => l
                )
            [distance] => N/A
        )

    [l] => Array
        (
            [occurrences] => 2
            [before] => Array
                (
                    [0] => a
                    [1] => l
                )
            [after] => Array
                (
                    [0] => l
                    [1] =>  
                )

            [distance] => 1
        )
    [v] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] =>  
                )
            [after] => Array
                (
                    [0] => s
                )
            [distance] => N/A
        )
    [s] => Array
        (
            [occurrences] => 2
            [before] => Array
                (
                    [0] => v
                    [1] =>  
                )
            [after] => Array
                (
                    [0] =>  
                    [1] => o
                )
            [distance] => 2
        )
    [c] => Array
        (
            [occurrences] => 2
            [before] => Array
                (
                    [0] => o
                    [1] => c
                )
            [after] => Array
                (
                    [0] => c
                    [1] => e
                )
            [distance] => 1
        )

    [e] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => c
                )
            [after] => Array
                (
                    [0] => r
                )
            [distance] => N/A
        )
    [r] => Array
        (
            [occurrences] => 1
            [before] => Array
                (
                    [0] => e
                )
            [after] => Array
                (
                    [0] => none
                )
            [distance] => N/A
        )
)
````

Or just converting to a simple graph:
````
Array
(
    [f] => Array
        (
            [0] => none
            [1] => o
        )
    [o] => Array
        (
            [0] => f
            [1] => o
            [2] => s
            [3] => o
            [4] => t
            [5] => c
        )
    [t] => Array
        (
            [0] => o
            [1] => b
        )
    [b] => Array
        (
            [0] => t
            [1] => a
        )
    [a] => Array
        (
            [0] => b
            [1] => l
        )
    [l] => Array
        (
            [0] => a
            [1] => l
            [2] => l
            [3] =>  
        )
    [v] => Array
        (
            [0] =>  
            [1] => s
        )
    [s] => Array
        (
            [0] => v
            [1] =>  
            [2] =>  
            [3] => o
        )
    [c] => Array
        (
            [0] => o
            [1] => c
            [2] => c
            [3] => e
        )
    [e] => Array
        (
            [0] => c
            [1] => r
        )
    [r] => Array
        (
            [0] => e
            [1] => none
        )
)
````

## Running testes
This package comes with a simple test coverage only to illustrate some scenes that should occur.
To run this tests, follow the steps:

 1. Run composer install in root folder
````
composer install
````
 2.  After composer installation, PHPUnit is available, so run all tests with the follow command:
````
vendor/bin/phpunit
````
 3.  But if you prefer to run a specific test, use the follow command:
````
vendor/bin/phpunit src/Test/PhraseTest.php
````
