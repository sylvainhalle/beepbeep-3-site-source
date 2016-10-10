Source for BeepBeep's Website
=============================

This repository contains the source files to generate the (static)
web site for BeepBeep 3. The generated site can be found at
[http://liflab.github.io/beepbeep-3](http://liflab.github.io/beepbeep-3).

The site uses *Fantastic Windmill* (FW) as its static web site generator.
FW reads content from a set of source files, applies a presentation 
template to them and saves the output as a set of static HTML files.
For more information, please refer to Fantastic Windmill's
[documentation](http://sylvainhalle.github.com/FantasticWindmill/).

## Quick Instructions

The templates for the web site are located in the `templates`
folder. You probably won't need to change these files, except perhaps
for `navigation-menu.php` which contains the items for the site's
top menu.

The site's content is rendered from files in the `content` folder. The
files have a `.md` extension and use the
[Markdown](https://daringfireball.net/projects/markdown/)
format; however, you can also insert raw HTML wherever you like if the
format does not suit your needs. As a rule, one file in that folder becomes
one page in the generated website, with the `.html` extension. If your
files are organized with folders in `content`, they will follow the
same folder structure in the generated web site.

To generate the web site, create a `public_html` folder (if it does not
exist); then type on the command line:

    $ make clean
    $ php fw/fw.php
    $ make mirror

The first instruction wipes the folder of its current contents (remember,
everthing there is supposed to be *generated*). The second launches FW
and creates the HTML files from the MD files. The third takes care of copying
to `public_html` all the other files that are in `content` (other than
`.md` and `.yaml` files).

The last step is to sync the `public_html` folder with the `gh-pages`
branch of the [beepbeep-3](https://github.com/liflab/beepbeep-3)
repository.

## Page Contents

The bottom of each `.md` files contains (optional) fields providing
metadata for the page. Some of the fields used in this site:

- `slug`: a unique name for each page. If a page exists in many languages,
  all versions of the page have the same slug, and differ in their `lang`
  parameter. In this site, no multilingual pages are planned. Still,
  give a slug to every page.
- `section-slug` (optional): the slug of one of the pages appearing in
  the navigation menu at the top. This is only used to "highlight" one
  of the menu items as the "current" one.
- `template`: if left empty, the page will be rendered with the default
  layout (no sidebar). Otherwise, you can specify either `left-sidebar.php`
  or `right-sidebar.php`. This will render the page with a sidebar, either
  at the left or the right. The contents of the sidebar will be fetched
  from a file called `xxx.sidebar.md`, where `xxx` is the current page's
  slug.

All links in the page can be written with **absolute** paths (i.e. start
with a slash and give the proper folder structure). FW takes care of
converting them into the appropriate relative links when generating the
site, depending on the pages' relative locations.

## There Are Two Repositories

- The [beepbeep-3-site-source](https://github.com/liflab/beepbeep-3-site-source)
  repository hosts the source files to generate the web site.
- The `public_html` folder is not versioned there, as it is generated
  from the `contents` and `template` folders. However, it is copied over
  to the `gh-pages` branch of the [beepbeep-3](https://github.com/liflab/beepbeep-3)
  repository.

Don't confuse the two!
