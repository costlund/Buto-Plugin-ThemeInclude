function PluginThemeInclude(){
  this.data = {}
  this.has_role = function(role){
    var i = 0;
    while (i < this.data.role.length) {
      if(this.data.role[i]==role){
        return true;
      }
      i++;
    }
    return false;
  }
}
var PluginThemeInclude = new PluginThemeInclude();
