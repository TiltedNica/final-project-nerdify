import{a as u,b as m,_ as i}from"./LeftSidebar-cf8d6a97.js";import{o as a,f as l,a as d,u as c,w as f,F as n,Z as p,b as e,m as g,K as r,t,d as o,g as x}from"./app-90fbd17e.js";const h={class:"flex h-screen"},v={class:"bg-[#F1F1F5] w-full flex flex-col px-48 gap-y-4"},w=e("div",{class:"flex mt-8"},[e("h2",{class:"font-bold text-2xl"},"Notifications")],-1),y={key:0,class:"w-full flex items-center justify-between p-4 bg-[#fffaed] rounded-2xl shadow-2xl"},b={class:"flex gap-x-5 items-center"},N={class:"flex flex-col gap-y-1.5"},k={class:"font-bold"},F=e("div",null,[e("img",{src:"/img/ic_likes%20yellow.svg",alt:""})],-1),j={key:1,class:"w-full flex items-center justify-between p-4 bg-[#d0e0e4] rounded-2xl shadow-2xl"},V={class:"flex gap-x-5 items-center"},A={class:"flex flex-col gap-y-1.5"},B={class:"font-bold"},C={class:"font-bold"},$=e("div",null,[e("img",{src:"/img/ic_comment%20green.png",alt:""})],-1),L={key:2,class:"w-full flex items-center justify-between p-4 bg-[#edf2fb] rounded-2xl shadow-2xl"},P={class:"flex gap-x-5 items-center"},D={class:"flex flex-col gap-y-1.5"},E={class:"font-bold"},K=e("div",null,[e("img",{src:"/img/ic_friends%20blue.png",alt:""})],-1),q={__name:"Notifications",props:{notifications:Object},setup(_){return(O,S)=>(a(),l(n,null,[d(c(p),{title:"Notifications"}),d(u,null,{default:f(()=>[e("div",h,[d(m),e("div",v,[w,(a(!0),l(n,null,g(_.notifications.data,s=>(a(),l(n,null,[s.type==="App\\Notifications\\LikedPostNotification"&&c(r)().props.auth.user.id!==s.data.user.id?(a(),l("div",y,[e("div",b,[d(i,{image:s.data.user.image,h:"42",w:"42"},null,8,["image"]),e("div",N,[e("div",null,[e("span",k,t(s.data.user.name),1),o(" liked your post. ")]),e("div",null,t(s.formatted_created_at),1)])]),F])):s.type==="App\\Notifications\\CommentPostNotification"&&c(r)().props.auth.user.id!==s.data.user.id?(a(),l("div",j,[e("div",V,[d(i,{image:s.data.user.image,h:"42",w:"42"},null,8,["image"]),e("div",A,[e("div",null,[e("span",B,t(s.data.user.name),1),o(" commented your post "),e("span",C,t(s.data.post.text),1),o(". ")]),e("div",null,t(s.formatted_created_at),1)])]),$])):s.type==="App\\Notifications\\FollowerNotification"?(a(),l("div",L,[e("div",P,[d(i,{image:s.data.user.image,h:"42",w:"42"},null,8,["image"]),e("div",D,[e("div",null,[e("span",E,t(s.data.user.name),1),o(" started following you ")]),e("div",null,t(s.formatted_created_at),1)])]),K])):x("",!0)],64))),256))])])]),_:1})],64))}};export{q as default};
