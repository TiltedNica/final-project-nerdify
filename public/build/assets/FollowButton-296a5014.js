import{o,c as t,w as l,d as s,u as n,j as u}from"./app-90fbd17e.js";const f={__name:"FollowButton",props:{username:String,followed:Boolean},setup(e){return(r,a)=>e.followed?(o(),t(n(u),{key:1,as:"button","preserve-scroll":"",method:"DELETE",href:r.route("users.unfollow",{user:`${e.username}`}),class:"py-2 px-3 rounded-2xl bg-red-600 border-none border-2 text-white text-center h-fit"},{default:l(()=>[s(" UnFollow ")]),_:1},8,["href"])):(o(),t(n(u),{key:0,as:"button","preserve-scroll":"",method:"POST",href:r.route("users.follow",{user:`${e.username}`}),class:"py-2 px-3 rounded-2xl bg-blue-600 border-none border-2 text-white text-center h-fit"},{default:l(()=>[s(" Follow ")]),_:1},8,["href"]))}};export{f as _};
