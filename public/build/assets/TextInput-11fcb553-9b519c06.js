import{e as n,j as d,_ as s,g as a,A as m,p as r,S as i,l as g,i as c}from"./index-0bcd163f.js";const f={class:"text-sm text-red-600"},S={__name:"InputError",props:{message:{type:String}},setup(e){return(u,t)=>n((s(),a("div",null,[m("p",f,r(e.message),1)],512)),[[d,e.message]])}},b={class:"block font-medium text-sm text-gray-700"},v={key:0},y={key:1},k={__name:"InputLabel",props:{value:{type:String}},setup(e){return(u,t)=>(s(),a("label",b,[e.value?(s(),a("span",v,r(e.value),1)):(s(),a("span",y,[c(u.$slots,"default")]))]))}},_=["value"],h={__name:"TextInput",props:{modelValue:{type:String,required:!0}},emits:["update:modelValue"],setup(e,{expose:u}){const t=i(null);return g(()=>{t.value.hasAttribute("autofocus")&&t.value.focus()}),u({focus:()=>t.value.focus()}),(o,l)=>(s(),a("input",{class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",value:e.modelValue,onInput:l[0]||(l[0]=p=>o.$emit("update:modelValue",p.target.value)),ref_key:"input",ref:t},null,40,_))}};export{h as S,k,S as x};
