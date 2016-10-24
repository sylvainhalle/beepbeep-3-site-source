Functions
=========

[Home](index.html)

A *function* is an object that takes one or more arguments as its input, and returns one or more values as its output.

In BeepBeep, functions are "first-class" citizens: each function is actually a Java `Object` you can instnatiate and manipulate like any other. More precisely, all functions are descendents of the abstract class {@link jdc:ca.uqac.lif.cep.functions.Function Function}.

## <a name="arity">Input and output arity</a>

The **arity** of a function refers to the number of input or output arguments a function has. For example, the function {@link jdc:ca.uqac.lif.cep.functions.Not Not} takes as input a single Boolean value, and returns a single Boolean value; hence it has an input arity of 1, and an output arity of 1 also. We shall all call it a "1:1 function". In contrast, the {@link jdc:ca.uqac.lif.cep.numbers.Addition Addition} function takes as input *two* numbers, and returns *one* number; its input arity is 2, and its output arity is 1, hence it is a 2:1 function. (Very few functions have an output arity greater than 1, although this is conceptually possible.)

## <a name="object">The <code>Function</code> object</a>

The most important method of a `Function` object is called {@link jdm:ca.uqac.lif.cep.functions.Function#evaluate(java.lang.Object[]) evaluate()}. This method is responsible for evaluating the outputs of the function, given some inputs.

Let us take as an example the function {@link jdc:ca.uqac.lif.cep.numbers.Addition Addition}. The following code shows an example usage of this function:

{@snipm Examples/src/functions/AddNumbers.java}{SNIP}

First, we get a reference to an instance of the `Addition` object. The `Addition` class is a *singleton*: there is only a single instance of it, a reference to which is given by the static field `instance`, and all uses of the function should be done by using that instance.

We then create an array of two objects, the numbers 2 and 3, and pass this array to the addition function through the `evaluate()` method. The method returns yet another array, containing the result of evaluating the function. Most functions return a single value, and so the resulting array is of size 1. The next instruction fetches the first (and only) element of the result array and casts it as a `Float`.

## <a name="constant">Two special functions: <code>Constant</code> and <code>ArgumentPlaceholder</code></a>

The {@link jdc:ca.uqac.lif.cep.functions.Constant Constant} object is a special type of function, with an input arity of 0 and an output arity of 1. In other words, a `Constant` does not take any input argument, and always returns the same predefined value. The value is determined when instantiating the object, and is passed to the constructor, as in the following example:

{@snipm Examples/src/functions/ConstantUsage.java}{SNIP}

A constant can return an `Object` of any kind; here is another constant that returns an integer value:

{@snipm Examples/src/functions/ConstantUsage.java}{SNAP}

On the contrary, the {@link jdc:ca.uqac.lif.cep.functions.ArgumentPlaceholder ArgumentPlaceholder} directly returns the *n*-th input argument. The value of *n* is specified through the constructor:

{@snipm Examples/src/functions/PlaceholderUsage.java}{SNIP}

Don't forget that arguments start at 0, so "1" designates the *second* input argument.

The usefulness of these two objects will be made clearer in the next section.

## <a name="functiontree">Composing functions</a>

BeepBeep comes with a small number of simple, predefined functions. This includes Boolean connectives ({@link jdc:ca.uqac.lif.cep.functions.And And}, {@link jdc:ca.uqac.lif.cep.functions.Or Or}, {@link jdc:ca.uqac.lif.cep.functions.Or Not}), a few elementary functions for manipulating numbers ({@link jdc:ca.uqac.lif.cep.numbers.Addition Addition}, {@link jdc:ca.uqac.lif.cep.numbers.Subtraction Subtraction}, etc.) and sets ({@link jdc:ca.uqac.lif.cep.sets.IsSubsetOrEqual IsSubsetOrEqual}, etc.). Very often, however, one wishes to create more complex functions by *composing* together multiple simpler functions.

Suppose for example you wish to create a function that checks whether a number *x* lies in the interval [0,2]. No elementary function can perform this task; however, one can compose multiple functions to compute that result: it suffices to check that *x*&gt;0 **and** that *x*&lt;2. This involves applying three functions: the {@link jdc:ca.uqac.lif.cep.numbers.IsGreaterThan IsGreaterThan} function comparing *x* to 0, the {@link jdc:ca.uqac.lif.cep.numbers.IsLessThan IsLessThan} comparing *x* to 1, and the {@link jdc:ca.uqac.lif.cep.functions.And And} function to combine these two results and return true or false.

In BeepBeep, this composite function can be done by creating a special type of `Function` object called {@link jdc:ca.uqac.lif.cep.functions.FunctionTree FunctionTree}. A FunctionTree is given a function of input arity *n*, followed by *n* arguments --each of which must be another `Function` instance, including another FunctionTree. This makes it possible to create complex expressions:

{@snipm Examples/src/functions/FixedInterval.java}{SNIP}

This code snippet creates a FunctionTree. The top-level function to evaluate is the Boolean "and"; its first argument is the return value of yet another FunctionTree, this time evaluating function `IsGreaterThan`. This function, in turn, takes as input yet two other functions: an `ArgumentPlaceholder` referring to the first argument (i.e. number 0), and a `Constant` with the value 0. This amounts to checking that the (first) argument passed is greater than 0. The second argument of the top-level tree is constructed in a similar way, and evaluates whether argument 0 is smaller than the constant 2.

The end result is a new `Function` instance with input arity 1 and output arity 1; it returns true if and only if its argument is greater than 0 and less than 1. It can be used like any other `Function` object:

{@snipm Examples/src/functions/FixedInterval.java}{SNAP}

The input arity of a function tree can be greater than one. For example, the following snippet creates a function *f(x,y,z)* of three arguments.

{@snipm Examples/src/functions/Interval.java}{SNIP}

The function returns true if *x* is between *y* and *z*, and false otherwise.

## <a name="class">Creating a new class</a>

If you intend on using a `FunctionTree` in multiple queries, it may be desirable to encapsulate it within a class you can then instantiate. To this end, you can create a new class that inherits from {@link jdc:ca.uqac.lif.cep.functions.PassthroughFunction PassthroughFunction}. This class requires you to implement a single method called {@link jdm:ca.uqac.lif.cep.functions.PassthroughFunction#getFunction() getFunction()}, which can return any object of type `Function` --including a `FunctionTree` that you instantiate programmatically:

{@snipm Examples/src/functions/Polynomial.java}{SNIP}

(Note in this example that the constructor to `ArgumentPlaceholder` assumes the value 0 when none is given.) The new class can then be used like any other `Function` object:

{@snipm Examples/src/functions/Polynomial.java}{SNAP}

## <a name="custom">Creating custom functions</a>

In the case where none of the available functions (or a composition thereof) suits your needs, BeepBeep also offers the possibility to create your own `Function` objects, composed of arbitrary Java code.

If your intended function is 1:1 or 2:1 (that is, it has an input arity of 1 or 2, and an output arity of 1), the easiest way is to create a new class that extends either {@link jdc:ca.uqac.lif.cep.functions.UnaryFunction UnaryFunction} or {@link jdc:ca.uqac.lif.cep.functions.BinaryFunction BinaryFunction}. These classes take care of most of the housekeeping associated to functions, and require you to simply implement a method called `getValue()`, responsible for computing the output, given some input(s). In this method, you can write whatever Java code you want.

As an example, let us create a function that, given a number, returns whether this number is prime. It is therefore a 1:1 function, so we will create a class that extends `UnaryFunction`.

<pre><code>public class IsPrime extends UnaryFunction&lt;Number,Boolean&gt;
{
}
</code>
</pre>

As you can see, you must also declare the input and output type for the function; here, the function accepts a `Number` and returns a `Boolean`. These types must also be reflected in the function's constructor, where you must call the superclass constructor and pass it a `Class` instance

{@snips Examples/src/functions/IsPrime.java}{private IsPrime()}

<!-- :wrap=soft: -->
---
slug: functions
section-slug: doc
lang: en
template: right-sidebar.php
...
