YUI.add("moodle-mod_offlinequiz-questionchooser",function(r,e){var o='.menu [data-action="addquestion"]',s="div.createnewquestion",d="div.chooserdialoguebody",u="div.choosertitle",t=function(){t.superclass.constructor.apply(this,arguments)};r.extend(t,M.core.chooserdialogue,{initializer:function(){r.one("body").delegate("click",this.display_dialogue,o,this)},display_dialogue:function(e){var o,t,n;for(e.preventDefault(),o=r.one(s+" "+d),t=r.one(s+" "+u),null===this.container&&(this.setup_chooser_dialogue(o,t,{}),this.prepare_chooser()),o=r.QueryString.parse(e.currentTarget.get("search").substring(1)),t=this.container.one("form"),this.parameters_to_hidden_input(o,t,"returnurl"),this.parameters_to_hidden_input(o,t,"cmid"),this.parameters_to_hidden_input(o,t,"category"),this.parameters_to_hidden_input(o,t,"addonpage"),this.parameters_to_hidden_input(o,t,"appendqnumstring"),this.display_chooser(e),n=r.all("#chooseform input[type=radio]")._nodes,i=0;i<n.length;i++)"item_qtype_multichoiceset"!=n[i].id&&"item_qtype_multichoice"!=n[i].id&&"item_qtype_description"!=n[i].id&&(n[i].disabled=!0)},parameters_to_hidden_input:function(e,i,o){var e=e.hasOwnProperty(o)?e[o]:"",t=i.one("input[name="+o+"]");t||(t=i.appendChild('<input type="hidden">')).set("name",o),t.set("value",e)}},{NAME:"mod_offlinequiz-questionchooser"}),M.mod_offlinequiz=M.mod_offlinequiz||{},M.mod_offlinequiz.init_questionchooser=function(){return M.mod_offlinequiz.question_chooser=new t({}),M.mod_offlinequiz.question_chooser}},"@VERSION@",{requires:["moodle-core-chooserdialogue","moodle-mod_offlinequiz-util","querystring-parse"]});