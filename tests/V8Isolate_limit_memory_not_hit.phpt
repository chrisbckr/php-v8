--TEST--
v8\Isolate - time memory not hit
--SKIPIF--
<?php if (!extension_loaded("v8")) print "skip"; ?>
--FILE--
<?php

/** @var \Phpv8Testsuite $helper */
$helper = require '.testsuite.php';

require '.v8-helpers.php';
$v8_helper = new PhpV8Helpers($helper);

$isolate = new v8\Isolate();
$extensions = [];
$global_template = new v8\ObjectTemplate($isolate);
$global_template->Set(new \v8\StringValue($isolate, 'print'), $v8_helper->getPrintFunctionTemplate($isolate), \v8\PropertyAttribute::DontDelete);

$context = new v8\Context($isolate, $extensions, $global_template);

$source = '
print("start\n"); 
print("end\n");
"Script done"';
$file_name1 = 'test.js';


$script = new v8\Script($context, new \v8\StringValue($isolate, $source), new \v8\ScriptOrigin($file_name1));

$memory_limit = 1024 * 1024 * 10;
$helper->assert('Memory limit accessor report no hit', false === $isolate->IsMemoryLimitHit());
$helper->assert('Get memory limit default value is zero', 0 === $isolate->GetMemoryLimit());
$isolate->SetMemoryLimit($memory_limit);
$helper->assert('Get memory limit returns valid value', $memory_limit === $isolate->GetMemoryLimit());

$helper->dump($isolate);
$helper->line();

$t = microtime(true);
try {
    $script->Run();
} finally {
    $helper->line();
    $t = microtime(true) - $t;
    $helper->dump(round($t, 9));
    $helper->assert('Script execution time is less than 0.5 sec', $t < 0.5);
}

$helper->assert('Get memory limit returns valid value', $memory_limit === $isolate->GetMemoryLimit());
$helper->assert('Memory limit accessor report not hit', false === $isolate->IsMemoryLimitHit());

$helper->line();
$helper->dump($isolate);
?>
--EXPECTF--
Memory limit accessor report no hit: ok
Get memory limit default value is zero: ok
Get memory limit returns valid value: ok
object(v8\Isolate)#3 (5) {
  ["snapshot":"v8\Isolate":private]=>
  NULL
  ["time_limit":"v8\Isolate":private]=>
  float(0)
  ["time_limit_hit":"v8\Isolate":private]=>
  bool(false)
  ["memory_limit":"v8\Isolate":private]=>
  int(10485760)
  ["memory_limit_hit":"v8\Isolate":private]=>
  bool(false)
}

start
end

float(0.%d)
Script execution time is less than 0.5 sec: ok
Get memory limit returns valid value: ok
Memory limit accessor report not hit: ok

object(v8\Isolate)#3 (5) {
  ["snapshot":"v8\Isolate":private]=>
  NULL
  ["time_limit":"v8\Isolate":private]=>
  float(0)
  ["time_limit_hit":"v8\Isolate":private]=>
  bool(false)
  ["memory_limit":"v8\Isolate":private]=>
  int(10485760)
  ["memory_limit_hit":"v8\Isolate":private]=>
  bool(false)
}