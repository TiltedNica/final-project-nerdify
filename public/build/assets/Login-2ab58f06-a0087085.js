import{A as t,V as h,E as i,R as n,_ as m,N as o,v as s,a as x,g as w,p as y,b as c,c as k,x as p,h as V,w as _,d as R,e as S,f as E}from"./index-0bcd163f.js";import{h as U}from"./GuestLayout-10146999-2e22f1e9.js";import{k as f,S as b,x as g}from"./TextInput-11fcb553-9b519c06.js";import{d as q}from"./PrimaryButton-5a3418e2-d939fb09.js";import"./ApplicationLogo-3a1f5601-0e5a3e56.js";import"./app-90fbd17e.js";import"./_plugin-vue_export-helper-c27b6911-f875bd67.js";const A=["value"],L={__name:"Checkbox",props:{checked:{type:[Array,Boolean],required:!0},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const u=l,d=R({get(){return u.checked},set(a){e("update:checked",a)}});return(a,r)=>S((m(),w("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":r[0]||(r[0]=v=>d.value=v),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,A)),[[E,d.value]])}},F={key:0,class:"mb-4 font-medium text-sm text-green-600"},N=["onSubmit"],P={class:"mt-4"},j={class:"block mt-4"},B={class:"flex items-center"},$=t("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),C={class:"flex items-center justify-end mt-4"},M={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=h({email:"",password:"",remember:!1}),u=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(d,a)=>(m(),i(U,null,{default:n(()=>[o(s(x),{title:"Log in"}),l.status?(m(),w("div",F,y(l.status),1)):c("",!0),t("form",{onSubmit:_(u,["prevent"])},[t("div",null,[o(f,{for:"email",value:"Email"}),o(b,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=r=>s(e).email=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(g,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",P,[o(f,{for:"password",value:"Password"}),o(b,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>s(e).password=r),required:"",autocomplete:"current-password"},null,8,["modelValue"]),o(g,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),t("div",j,[t("label",B,[o(L,{name:"remember",checked:s(e).remember,"onUpdate:checked":a[2]||(a[2]=r=>s(e).remember=r)},null,8,["checked"]),$])]),t("div",C,[l.canResetPassword?(m(),i(s(k),{key:0,href:d.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[p(" Forgot your password? ")]),_:1},8,["href"])):c("",!0),o(q,{class:V(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:n(()=>[p(" Log in ")]),_:1},8,["class","disabled"])])],40,N)]),_:1}))}};export{M as default};
