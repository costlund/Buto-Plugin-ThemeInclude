# Buto-Plugin-ThemeInclude

This plugin include other plugins matching Bootstrap 4 usage. It will keep your theme settings file smaller.


## Widget

Include widget in html head section.


Param data/bootswatch/theme has to be set to one of www.bootswatch.com themes for version 4.3.1.
```
type: widget
data:
  plugin: 'theme/include'
  method: include
  data:
    bootswatch:
      theme: Cerulean
```

## Icon

Path to icon.

```
/theme/[theme]/icon/link_icon.png
```
