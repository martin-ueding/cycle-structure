<pre>
<?php
# Copyright © 2014 Martin Ueding <dev@martin-ueding.de>

#$n = (int) $_GET['n'];

function insert_partition($part, $n, $i, $partitions) {
    # Calculate the sum of the entries. This must not be greater than `n`.
    $taken = 0;
    for ($k = 0; $k != $n; $k++) {
        $taken += $part[$k];
    }
    $free = $n - $taken;

    if ($i == $n) {
        if ($free != 0) {
            return;
        }
        print_r($part);
        $partitions[] = $part;
    }
    else {
        for ($k = 0; $k <= $free && ($i == 0 || $k <= $part[$i-1]); $k++) {
            $part[$i] = $k;
            $partitions = insert_partition($part, $n, $i+1, $partitions);
        }
    }

    return $partitions;
}

function partitions($n) {
    $partitions = array();

    $part= array();
    for ($i = 0; $i != $n; $i++) {
        $part[$i] = 0;
    }

    $partitions = insert_partition($part, $n, 0, $partitions);

    return $partitions;
}

$parts = partitions(4);
print_r($parts);

?>
</pre>
