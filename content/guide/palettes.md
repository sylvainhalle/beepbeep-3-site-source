Introduction to Palettes
========================

[Home](index.html) &gt; [Extending BeepBeep](extend.html)

A palette is implemented as a JAR file that is loaded with BeepBeep's main program to extend its functionalities in a particular way. For example, one palette provides functions and processors to manipulate XML events, while another contains processors to create finite-state machines and temporal logic expressions.

Many palettes are available alongside BeepBeep from the [palettes web site](http://liflab.github.io/beepbeep-3-palettes). In the following, we describe a few of the palettes that have already been developed for BeepBeep in the recent past.

## <a name="ltl-fo">LTL-FO+</a>

This palette provides processors for evaluating all operators of Linear Temporal Logic (LTL), in addition to the first-order quantification defined in LTL-FO$^+$ (and present in previous versions of BeepBeep).

## <a name="fsm">FSM</a>

This palette allows one to define a Moore machine, a special case of finite-state machine where each state is associated to an output symbol. This Moore machine allows its transitions to be guarded by arbitrary functions; hence it can operate on traces of events of any type.

Moreover, transitions can be associated to a list of `ContextAssignment` objects, meaning that the machine can also query and modify its `Context` object. Depending on the context object being manipulated, the machine can work as a pushdown automaton, an extended finite-state machine \cite{DBLP:conf/dac/ChengK93}, and multiple variations thereof. Combined with the first-order quantifiers of the LTL-FO$^+$ package, a processing similar to Quantified Event Automata (QEA) \cite{DBLP:conf/fm/BarringerFHRR12} is also possible.

## <a name="others">Other Palettes</a>

Among other palettes, we mention:

- Gnuplot: This palette allows the conversion of events into input files for the Gnuplot application. For example, an event that is a set of $(x,y)$ coordinates can be transformed into a text file producing a 2D scatterplot of these points. An additional processor can receive these strings of text, call Gnuplot in the background and retrieve its output. The events of the output trace, in this case, are binary strings containing image files.

- Sets: This palette provides an implementation of the `Multiset` data structure, and a handful of functions for comparing sets ($\subseteq$, $\in$, card) and manipulating them ($\cup$, $\cap$, $+$, $\setminus$).

- Tuples: This palette provides the implementation of the named tuple event type. A named tuple is a map between names (i.e.\ Strings) and arbitrary objects. When these objects are scalar values, a named tuple corresponds to the similarly named concept in relational databases. In addition, the palette includes a few utility functions for manipulating tuples. The `Select` processor allows a tuple to be created by naming and combining the contents of multiple input events. The `From` processor transforms input events from multiple traces into an array (which can be used by `Select`), and the `Where` processor internally duplicates an input trace and sends it into a `Filter` evaluating some function. Combined together, these processors provide the same kind of functionality as the SQL-like SELECT statement of other CEP engines.

- XML, JSON and CSV: The XML palette provides a processor that converts text events into parsed XML documents. It also contains a `Function` object that can evaluate an XPath expression on an XML document. Another palette provides the same functionalities for events in the JSON and the CSV format.

<!-- :wrap=soft: -->
---
slug: palettes
section-slug: doc
lang: en
template: right-sidebar.php
...
