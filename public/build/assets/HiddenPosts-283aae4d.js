import{a as r,b as n}from"./LeftSidebar-cf8d6a97.js";import{_ as l}from"./Post-c5e1e3e9.js";import{o as t,c as m,w as i,b as s,a,f as c,m as _,F as d}from"./app-90fbd17e.js";import"./index-0bcd163f.js";const f={class:"flex h-screen"},u={class:"bg-[#F1F1F5] w-full flex flex-col items-center px-48"},p=s("div",{class:"flex w-full justify-center items-center gap-x-24 mt-8"},[s("h2",{class:"font-bold text-lg"},"Hidden Posts")],-1),v={__name:"HiddenPosts",props:{user:Object,posts:Object},setup(o){return(x,h)=>(t(),m(r,null,{default:i(()=>[s("div",f,[a(n),s("div",u,[p,(t(!0),c(d,null,_(o.posts.data,e=>(t(),c("div",{key:e.id},[a(l,{user:e.user,post:e,comments:e.comments},null,8,["user","post","comments"])]))),128))])])]),_:1}))}};export{v as default};