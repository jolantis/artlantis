# Text Grid

This is a plugin for [Kirby](http://getkirby.com/) that enables a simple syntax in Kirbytext for simple (2 or 3-column) grid layouts.

(based on this post: https://getkirby.com/docs/cookbook/columns-in-kirbytext)

## Installation

[Download the plugins repository](...) and copy the `figure-grid` folder to `/site/plugins` of your site.

## Example usage in Kirbytext

```
(grid…)

(image: ...)

++++

(image: ...)

++++

(image: ...)

(…grid)
```

The `++++` seperator is used to divide text into columns. You can create additional columns by just adding more separators. Just make sure to provide the necessary classes for more grid columns in your css.

For the opening and closing column tags you can either use the more elegant ellipsis … (Alt+. on a Mac) or three dots.

```
(grid…)

(grid)
```

or

```
(grid...)

(...grid)
```
