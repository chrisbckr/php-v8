--TEST--
V8\ObjectValue
--SKIPIF--
<?php if (!extension_loaded("v8")) print "skip"; ?>
--FILE--
<?php

/** @var \Phpv8Testsuite $helper */
$helper = require '.testsuite.php';

$isolate = new \V8\Isolate();
$extensions = [];
$global_template = new V8\ObjectTemplate($isolate);

$context = new V8\Context($isolate, $extensions, $global_template);

$value = new V8\ObjectValue($context);


$helper->header('Object representation');
$helper->dump($value);
$helper->space();

$helper->assert('ObjectValue extends Value', $value instanceof \V8\Value);
$helper->assert('ObjectValue does not extend PrimitiveValue', !($value instanceof \V8\PrimitiveValue));
$helper->line();

$helper->header('Accessors');
$helper->method_matches($value, 'GetIsolate', $isolate);
$helper->method_matches($value, 'GetContext', $context);
$helper->method_matches($value, 'CreationContext', $context);
$helper->space();

$helper->header('Getters');
$helper->method_export($value, 'GetIdentityHash');
$helper->space();

$helper->header('Converters');
$helper->dump_object_methods($value, ['@@default' => [$context]], new RegexpFilter('/^To/'));

?>
--EXPECTF--
Object representation:
----------------------
object(V8\ObjectValue)#5 (2) {
  ["isolate":"V8\Value":private]=>
  object(V8\Isolate)#2 (5) {
    ["snapshot":"V8\Isolate":private]=>
    NULL
    ["time_limit":"V8\Isolate":private]=>
    float(0)
    ["time_limit_hit":"V8\Isolate":private]=>
    bool(false)
    ["memory_limit":"V8\Isolate":private]=>
    int(0)
    ["memory_limit_hit":"V8\Isolate":private]=>
    bool(false)
  }
  ["context":"V8\ObjectValue":private]=>
  object(V8\Context)#4 (4) {
    ["isolate":"V8\Context":private]=>
    object(V8\Isolate)#2 (5) {
      ["snapshot":"V8\Isolate":private]=>
      NULL
      ["time_limit":"V8\Isolate":private]=>
      float(0)
      ["time_limit_hit":"V8\Isolate":private]=>
      bool(false)
      ["memory_limit":"V8\Isolate":private]=>
      int(0)
      ["memory_limit_hit":"V8\Isolate":private]=>
      bool(false)
    }
    ["extensions":"V8\Context":private]=>
    array(0) {
    }
    ["global_template":"V8\Context":private]=>
    object(V8\ObjectTemplate)#3 (1) {
      ["isolate":"V8\Template":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
    ["global_object":"V8\Context":private]=>
    NULL
  }
}


ObjectValue extends Value: ok
ObjectValue does not extend PrimitiveValue: ok

Accessors:
----------
V8\ObjectValue::GetIsolate() matches expected value
V8\ObjectValue::GetContext() matches expected value
V8\ObjectValue::CreationContext() matches expected value


Getters:
--------
V8\ObjectValue->GetIdentityHash(): int(%d)


Converters:
-----------
V8\ObjectValue(V8\Value)->ToBoolean():
    object(V8\BooleanValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToNumber():
    object(V8\NumberValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToString():
    object(V8\StringValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToDetailString():
    object(V8\StringValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToObject():
    object(V8\ObjectValue)#5 (2) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
      ["context":"V8\ObjectValue":private]=>
      object(V8\Context)#4 (4) {
        ["isolate":"V8\Context":private]=>
        object(V8\Isolate)#2 (5) {
          ["snapshot":"V8\Isolate":private]=>
          NULL
          ["time_limit":"V8\Isolate":private]=>
          float(0)
          ["time_limit_hit":"V8\Isolate":private]=>
          bool(false)
          ["memory_limit":"V8\Isolate":private]=>
          int(0)
          ["memory_limit_hit":"V8\Isolate":private]=>
          bool(false)
        }
        ["extensions":"V8\Context":private]=>
        array(0) {
        }
        ["global_template":"V8\Context":private]=>
        object(V8\ObjectTemplate)#3 (1) {
          ["isolate":"V8\Template":private]=>
          object(V8\Isolate)#2 (5) {
            ["snapshot":"V8\Isolate":private]=>
            NULL
            ["time_limit":"V8\Isolate":private]=>
            float(0)
            ["time_limit_hit":"V8\Isolate":private]=>
            bool(false)
            ["memory_limit":"V8\Isolate":private]=>
            int(0)
            ["memory_limit_hit":"V8\Isolate":private]=>
            bool(false)
          }
        }
        ["global_object":"V8\Context":private]=>
        NULL
      }
    }
V8\ObjectValue(V8\Value)->ToInteger():
    object(V8\NumberValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToUint32():
    object(V8\NumberValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToInt32():
    object(V8\NumberValue)#90 (1) {
      ["isolate":"V8\Value":private]=>
      object(V8\Isolate)#2 (5) {
        ["snapshot":"V8\Isolate":private]=>
        NULL
        ["time_limit":"V8\Isolate":private]=>
        float(0)
        ["time_limit_hit":"V8\Isolate":private]=>
        bool(false)
        ["memory_limit":"V8\Isolate":private]=>
        int(0)
        ["memory_limit_hit":"V8\Isolate":private]=>
        bool(false)
      }
    }
V8\ObjectValue(V8\Value)->ToArrayIndex(): V8\Exceptions\GenericException: Failed to convert
