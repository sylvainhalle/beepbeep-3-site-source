Features
========

## Easy to use

The principles behind BeepBeep are very simple: you can [learn to write queries in five minutes](/quickintro.html). In your Java program, running queries and getting realtime results requires [as little as five lines of code](/quickintro.html#results), using [JDBC](quickintro.html#jdbc) if you want. No heavy setup is required.

## Simple language

BeepBeep's input language is called ESQL. Its intuitive syntax makes it easy to write common queries in just a few keywords that a non-specialist can read and understand.

Contrarily to the majority of other CEP tools, **what is common with SQL is written like in SQL**. Many other CEP engines reinvent a new syntax for simple tasks that SQL can already do. For example, selecting all events where cnt > 10 in trace webfeeds is written in Cayuga as:

    SELECT * FROM FILTER{cnt > 10}(webfeeds)

while in BeepBeep you write, as you should:

    (SELECT * FROM webfeeds) WHERE cnt > 10

Therefore, there are large parts of it (SELECT, WHERE, etc.) that you already know… without knowing it. We claim BeepBeep has the language with the closest syntax to SQL.

## Extensible

In Complex Event Processing, there is no "one size fits all", and no one cannot foresee all the possible uses of a tool. Instead of cramming functions into a language that remains frozen, BeepBeep was designed from the start to be extended by users. Creating your own processors, which you can combine like any other, takes [five lines of boilerplate code](/custom.html), and can be learned in minutes. This is easier than for any other CEP engine.

Most importantly, you can also [define your own ESQL syntactical rules](/extend.html) for the processors you create (again in less than 10 lines of code), complete with arguments of any type, so that your processors can be used within ESQL expressions. This very flexible mechanism is unique to all CEP engines, and makes it possible to create extension packages that provide your own **domain-specific language (DSL)**.

## Lightweight

BeepBeep's JAR is around **300 kb** and requires a vanilla JRE 1.6 (or later) to run (compare this to [Esper](http://www.espertech.com/)'s 5 *megabytes* of code and dependencies). It does not depend on any other library, meaning you can fit it into places where others can't.

## Push and pull modes

All CEP engines are designed with a specific use case in mind: sources of events produce events, which are passed to the query as they are generated. Whenever the query generates a new output event, some callback function is called, and your program can do something with this event. This is called push mode.

There also exist the reverse functionality: whenever it requires so, the program asks the query for a new event, and effectively pulls it out; this, ultimately, may require pulling one or more new events from the source. This is what you use when invoking a relational database with JDBC, and iterate over the lines of a result. No one would think of the reverse (being called back when the database sends you a new line) as convenient. Yet, as far as we know, only BeepBeep allows you to handle event traces in both push **and** pull mode, depending on your needs.

## Good throughput

Discussions on CEP are dominated by throughput: churning the most events per second. If this is all that matters in your context, don't bother using any of the CEP tools around, as you can write custom, low-level code that will outpace them by a large margin. Any other choice you make means you're willing to sacrifice some of that throughput for other factors: perhaps readability, ease of use, built-in features, etc. (See: [why use ESQL](/why.html).)

Still, it's good to know that BeepBeep fares well on that respect. Doing benchmarks is always tricky (this is probably why all other tools claim "high throughput" without giving any direct comparison with others), but on the ones we did, BeepBeep stands somehwere between Esper and Siddhi for simple queries (sliding windows, etc.). For more complex patterns, BeepBeep loses them both, and in some cases is the only one able to complete a query without crashing or timing out.

## Versatile

Although you can extend the language to suit your needs, BeepBeep already comes with a few extension packages to do things:

- Generate realtime heatmaps, histograms and scatterplots with the Gnuplot package
- Read and write data to common formats (e.g. CSV, XML)
- Call any external command on an event and fetch its standard output
- Read event sources across a newtork by simply giving their URL
- Write complex sequential patterns of events using Linear Temporal Logic
- Read a table from a relational database and turn it into an event trace on the fly

<!-- :wrap=soft: -->
---
slug: doc
section-slug: doc
lang: en
template: left-sidebar.php
...
