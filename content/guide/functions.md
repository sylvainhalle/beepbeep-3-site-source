Functions
=========

[Home](index.html)

A *function* is an object that takes one or more arguments as its input, and returns one or more values as its output.

Functions can be used to manipulate objects of all types. For example, the Boolean "and" connective can be seen as a function that takes two Boolean values as its input, and returns another Boolean value as its output. Arithmetical operators, such as addition, can be viewed as a function that takes two numbers as its input and returns another number as its output.

In BeepBeep, functions are "first-class" citizens: each function is actually a Java `Object` you can instnatiate and manipulate like any other. More precisely, all functions are descendents of the abstract class {@link jdc:ca.uqac.lif.cep.functions.Function Function}.

The most important method of a `Function` object is called {@link jdm:ca.uqac.lif.cep.functions.Function#evaluate(java.lang.Object[]) evaluate()}. This method is responsible for evaluating the outputs of the function, given some inputs.

Let us take as an example the function {@link jdc:ca.uqac.lif.cep.numbers.Addition Addition}. The following code shows an example usage of this function:

!!SNIP(Examples/src/functions/AddNumbers.java)

First, we get a reference to an instance of the `Addition` object. The `Addition` class is a *singleton*: there is only a single instance of it, a reference to which is given by the static field `instance`, and all uses of the function should be done by using that instance. We then create an array of two objects, the numbers 2 and 3, and pass this array to the addition function through the `evaluate()` method. The method returns yet another array, containing the result of evaluating the function. Most functions return a single value, and so the resulting array is of size 1. The next instruction fetches the first (and only) element of the result array and casts it as a `Float`.

## <a name="functiontree">Composing Functions</a>


!!SNIP(Examples/src/functions/Interval.java)

<!-- :wrap=soft: -->
---
slug: functions
section-slug: doc
lang: en
template: right-sidebar.php
...
