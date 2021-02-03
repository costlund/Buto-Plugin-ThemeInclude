# Buto-Plugin-ThemeInclude
This plugin include other plugins matching Bootstrap 4 usage. It will keep your theme settings file smaller.
## Widget
Include widget in html head section.
```
type: widget
data:
  plugin: 'theme/include'
  method: include
```
### Bootswatch
Check out plugin bootstrap/bootswatch_v431 for availible theme settings. Param data/bootswatch/theme has to be set to one of www.bootswatch.com themes for version 4.3.1. If not set theme Cerulean is used.
```
data:
  data:
    icon: '/theme/[theme]/icon/link_icon.png'
    bootswatch:
      theme: Cerulean
```
### Icon
Path to icon is optional. Default value below.
```
data:
  data:
    icon: '/theme/[theme]/icon/link_icon.png'
```
### Noindex
Set enable to true to stop search engins for indexing pages.
```
data:
  data:
    noindex:
      enabled: true
```
