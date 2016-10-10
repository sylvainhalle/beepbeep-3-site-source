Palettes
========

BeepBeep was designed from the start to be easily extensible. As was discussed earlier,
it consists of only a small core of built-in processors and functions. The rest of its
functionalities are implemented through custom processors and grammar extensions,
grouped in packages called palettes. Concretely, a palette is implemented as a JAR file
that is loaded with BeepBeep's main program to extend its functionalities in a particular
way. Users can also create their own new processors, and extend the eSQL grammar so
that these processors can be integrated in queries.

This modular organization has three advantages. First, they are a flexible and generic
way to extend the engine to various application domains, in ways unforeseen by its
original designers. Second, they make the engine's core (and each palette individually)
relatively small and self-contained, easing the development and debugging process.4
Finally, it is hoped that BeepBeep's palette architecture, combined with its simple
extension mechanisms, will help third-party users contribute to the BeepBeep ecosystem
by developing and distributing extensions suited to their own needs.

We describe a few of the palettes that have already been developed for BeepBeep
in the recent past. These processors are available alongside BeepBeep from the [palette repository](https://github.com/liflab/beepbeep-3-palettes)
software repository.

- **LTL-FO+**: This palette provides processors for evaluating all operators of Linear Temporal Logic
(LTL), in addition to the first-order quantification defined in LTL-FO + (and present in
previous versions of BeepBeep)
- **FSM**: This palette allows one to define a Moore machine, a special case of finite-state machine
where each state is associated to an output symbol. This Moore machine allows its
transitions to be guarded by arbitrary functions; hence it can operate on traces of events
of any type.
- **Gnuplot**: This palette allows the conversion of events into input files for the Gnuplot
application. For example, an event that is a set of (x, y) coordinates can be transformed
into a text file producing a 2D scatterplot of these points. An additional processor can
receive these strings of text, call Gnuplot in the background and retrieve its output.
The events of the output trace, in this case, are binary strings containing image files.5
- **Tuples**: This palette provides the implementation of the named tuple event type. A named
tuple is a map between names (i.e. Strings) and arbitrary objects. In addition, the
palette includes a few utility functions for manipulating tuples. The Select processor
allows a tuple to be created by naming and combining the contents of multiple input
events. The From processor transforms input events from multiple traces into an array
(which can be used by Select), and the Where processor internally duplicates an
input trace and sends it into a Filter evaluating some function. Combined together,
these processors provide the same kind of functionality as the SQL-like SELECT
statement of other CEP engines.
- **XML, JSON and CSV**: This palette provides a processor that converts text events into
parsed XML documents. It also contains a Function object that can evaluate
an XPath expression on an XML document. Another palette provides the same
functionalities for events in the JSON and the CSV format.

<!-- :wrap=soft: -->
---
slug: palettes
section-slug: features
lang: en
...
