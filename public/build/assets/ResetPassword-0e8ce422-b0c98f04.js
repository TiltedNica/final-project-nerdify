import{V as c,E as w,R as n,_ as f,N as a,v as e,a as _,A as l,x as V,h as g,w as v}from"./index-0bcd163f.js";import{h as b}from"./GuestLayout-10146999-2e22f1e9.js";import{k as t,S as m,x as d}from"./TextInput-11fcb553-9b519c06.js";import{d as y}from"./PrimaryButton-5a3418e2-d939fb09.js";import"./ApplicationLogo-3a1f5601-0e5a3e56.js";import"./app-90fbd17e.js";import"./_plugin-vue_export-helper-c27b6911-f875bd67.js";const k=["onSubmit"],x={class:"mt-4"},h={class:"mt-4"},q={class:"flex items-center justify-end mt-4"},j={__name:"ResetPassword",props:{email:{type:String,required:!0},token:{type:String,required:!0}},setup(p){const i=p,s=c({token:i.token,email:i.email,password:"",password_confirmation:""}),u=()=>{s.post(route("password.store"),{onFinish:()=>s.reset("password","password_confirmation")})};return(P,o)=>(f(),w(b,null,{default:n(()=>[a(e(_),{title:"Reset Password"}),l("form",{onSubmit:v(u,["prevent"])},[l("div",null,[a(t,{for:"email",value:"Email"}),a(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(s).email,"onUpdate:modelValue":o[0]||(o[0]=r=>e(s).email=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(d,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),l("div",x,[a(t,{for:"password",value:"Password"}),a(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:e(s).password,"onUpdate:modelValue":o[1]||(o[1]=r=>e(s).password=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(d,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),l("div",h,[a(t,{for:"password_confirmation",value:"Confirm Password"}),a(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:e(s).password_confirmation,"onUpdate:modelValue":o[2]||(o[2]=r=>e(s).password_confirmation=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(d,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),l("div",q,[a(y,{class:g({"opacity-25":e(s).processing}),disabled:e(s).processing},{default:n(()=>[V(" Reset Password ")]),_:1},8,["class","disabled"])])],40,k)]),_:1}))}};export{j as default};
