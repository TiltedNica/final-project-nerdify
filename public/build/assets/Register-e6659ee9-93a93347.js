import{V as c,E as f,R as i,_ as w,N as a,v as s,a as g,A as r,x as u,c as V,h as _,w as v}from"./index-0bcd163f.js";import{h as x}from"./GuestLayout-10146999-2e22f1e9.js";import{k as m,S as t,x as d}from"./TextInput-11fcb553-9b519c06.js";import{d as b}from"./PrimaryButton-5a3418e2-d939fb09.js";import"./ApplicationLogo-3a1f5601-0e5a3e56.js";import"./app-90fbd17e.js";import"./_plugin-vue_export-helper-c27b6911-f875bd67.js";const h=["onSubmit"],y={class:"mt-4"},k={class:"mt-4"},q={class:"mt-4"},R={class:"flex items-center justify-end mt-4"},B={__name:"Register",setup(S){const e=c({name:"",email:"",password:"",password_confirmation:""}),n=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})};return(p,o)=>(w(),f(x,null,{default:i(()=>[a(s(g),{title:"Register"}),r("form",{onSubmit:v(n,["prevent"])},[r("div",null,[a(m,{for:"name",value:"Name"}),a(t,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:s(e).name,"onUpdate:modelValue":o[0]||(o[0]=l=>s(e).name=l),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),a(d,{class:"mt-2",message:s(e).errors.name},null,8,["message"])]),r("div",y,[a(m,{for:"email",value:"Email"}),a(t,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":o[1]||(o[1]=l=>s(e).email=l),required:"",autocomplete:"username"},null,8,["modelValue"]),a(d,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",k,[a(m,{for:"password",value:"Password"}),a(t,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":o[2]||(o[2]=l=>s(e).password=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(d,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",q,[a(m,{for:"password_confirmation",value:"Confirm Password"}),a(t,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:s(e).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=l=>s(e).password_confirmation=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(d,{class:"mt-2",message:s(e).errors.password_confirmation},null,8,["message"])]),r("div",R,[a(s(V),{href:p.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:i(()=>[u(" Already registered? ")]),_:1},8,["href"]),a(b,{class:_(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:i(()=>[u(" Register ")]),_:1},8,["class","disabled"])])],40,h)]),_:1}))}};export{B as default};
