<?php
trait demo {
    public function test() {
        echo 'Hello';
    }
}

class getDemoData {
    use demo;
    public function test() {
        echo 'hello aspl';
    }
}

$o = new getDemoData();
$o->test();
?>