Functions
=========

[Home](index.html)

A *function* is an object that takes one or more arguments as its input, and returns one or more values as its output.

Functions can be used to manipulate objects of all types. For example, the Boolean "and" connective can be seen as a function that takes two Boolean values as its input, and returns another Boolean value as its output. Arithmetical operators, such as addition, can be viewed as a function that takes two numbers as its input and returns another number as its output.

In BeepBeep, functions are "first-class" citizens: each function is actually a Java `Object` you can instnatiate and manipulate like any other. More precisely, all functions are descendents of the abstract class [Function](jdc:ca.uqac.lif.cep.functions.Function).

The most important method of a `Function` object is called <a href="jdm:ca.uqac.lif.cep.functions.Function#evaluate(java.lang.Object[])">evaluate()</a>. This method is responsible for evaluating the outputs of the function, given some inputs.

Let us take as an example the function [Addition](jdc:ca.uqac.lif.cep.numbers.Addition). The following code shows an example usage of this function:

!!SNIP(Examples/src/functions/AddNumbers.java)

First, we get a refernce to an instance of the `Addition` object. The `Addition` class is a *singleton*: there is only a single instance of it, a reference to which is given by the static field `instance`, and all uses of the function should be done by using that instance.


!!SNIP(Examples/src/functions/Interval.java)

<!-- :wrap=soft: -->
---
slug: custom
section-slug: doc
lang: en
...
