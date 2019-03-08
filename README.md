# Buto-Plugin-ThemeInclude

This plugin include other plugins matching Bootstrap 4 usage. It will keep your theme settings file smaller.


## Widget

Include widget in html head section.


```
type: widget
data:
  plugin: 'theme/include'
  method: include
  data:
    bootswatch:
      theme: Cerulean
```

```
data/bootswatch/theme
One of www.bootswatch.com themes for version 4.3.1.
```
