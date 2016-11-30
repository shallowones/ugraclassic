function pano2vrSkin(player,skinlayer) {
	var me=this;
	var flag=false;
	this.player=player;
	this.player.skinObj=this;
	this.divSkin=(skinlayer)?skinlayer:player.divSkin;
	this.elementMouseDown=new Array();
	this.elementMouseOver=new Array();
	this.player.setMargins(0,0,0,0);
	this.updateSize=function(startElement) {
		var stack=new Array();
		stack.push(startElement);
		while(stack.length>0) {
			e=stack.pop();
			if (e.ggUpdatePosition) {
				e.ggUpdatePosition();
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
	}
	
	parameterToTransform=function(p) {
		return 'translate(' + p.rx + 'px,' + p.ry + 'px) rotate(' + p.a + 'deg) scale(' + p.sx + ',' + p.sy + ')';
	}
	
	this.findElements=function(id,regex) {
		var r=new Array();
		var stack=new Array();
		var pat=new RegExp(id,'');
		stack.push(me.divSkin);
		while(stack.length>0) {
			e=stack.pop();
			if (regex) {
				if (pat.test(e.ggId)) r.push(e);
			} else {
				if (e.ggId==id) r.push(e);
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
		return r;
	}
	
	this.addSkin=function() {
		this._buttons_container=document.createElement('div');
		this._buttons_container.ggId='buttons_container'
		this._buttons_container.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._buttons_container.ggVisible=true;
		this._buttons_container.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-117 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-48 + h) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -117px;';
		hs+='top:  -48px;';
		hs+='width: 281px;';
		hs+='height: 33px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._buttons_container.setAttribute('style',hs);
		this._up=document.createElement('div');
		this._up.ggId='up'
		this._up.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._up.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -65px;';
		hs+='top:  -16px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._up.setAttribute('style',hs);
		this._up__img=document.createElement('img');
		this._up__img.setAttribute('src','images/up.svg');
		this._up__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._up.appendChild(this._up__img);
		this._up.onmouseover=function () {
			me._up__img.src='images/up__o.svg';
		}
		this._up.onmouseout=function () {
			me._up__img.src='images/up.svg';
			me.elementMouseDown['up']=false;
		}
		this._up.onmousedown=function () {
			me.elementMouseDown['up']=true;
		}
		this._up.onmouseup=function () {
			me.elementMouseDown['up']=false;
		}
		this._up.ontouchend=function () {
			me.elementMouseDown['up']=false;
		}
		this._buttons_container.appendChild(this._up);
		this._down=document.createElement('div');
		this._down.ggId='down'
		this._down.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._down.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -67px;';
		hs+='top:  16px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._down.setAttribute('style',hs);
		this._down__img=document.createElement('img');
		this._down__img.setAttribute('src','images/down.svg');
		this._down__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._down.appendChild(this._down__img);
		this._down.onmouseover=function () {
			me._down__img.src='images/down__o.svg';
		}
		this._down.onmouseout=function () {
			me._down__img.src='images/down.svg';
			me.elementMouseDown['down']=false;
		}
		this._down.onmousedown=function () {
			me.elementMouseDown['down']=true;
		}
		this._down.onmouseup=function () {
			me.elementMouseDown['down']=false;
		}
		this._down.ontouchend=function () {
			me.elementMouseDown['down']=false;
		}
		this._buttons_container.appendChild(this._down);
		this._left=document.createElement('div');
		this._left.ggId='left'
		this._left.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._left.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -91px;';
		hs+='top:  -1px;';
		hs+='width: 32px;';
		hs+='height: 33px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._left.setAttribute('style',hs);
		this._left__img=document.createElement('img');
		this._left__img.setAttribute('src','images/left.svg');
		this._left__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 33px;');
		this._left.appendChild(this._left__img);
		this._left.onmouseover=function () {
			me._left__img.src='images/left__o.svg';
		}
		this._left.onmouseout=function () {
			me._left__img.src='images/left.svg';
			me.elementMouseDown['left']=false;
		}
		this._left.onmousedown=function () {
			me.elementMouseDown['left']=true;
		}
		this._left.onmouseup=function () {
			me.elementMouseDown['left']=false;
		}
		this._left.ontouchend=function () {
			me.elementMouseDown['left']=false;
		}
		this._buttons_container.appendChild(this._left);
		this._right=document.createElement('div');
		this._right.ggId='right'
		this._right.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._right.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -42px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._right.setAttribute('style',hs);
		this._right__img=document.createElement('img');
		this._right__img.setAttribute('src','images/right.svg');
		this._right__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._right.appendChild(this._right__img);
		this._right.onmouseover=function () {
			me._right__img.src='images/right__o.svg';
		}
		this._right.onmouseout=function () {
			me._right__img.src='images/right.svg';
			me.elementMouseDown['right']=false;
		}
		this._right.onmousedown=function () {
			me.elementMouseDown['right']=true;
		}
		this._right.onmouseup=function () {
			me.elementMouseDown['right']=false;
		}
		this._right.ontouchend=function () {
			me.elementMouseDown['right']=false;
		}
		this._buttons_container.appendChild(this._right);
		this._button_zoom_in=document.createElement('div');
		this._button_zoom_in.ggId='button_zoom_in'
		this._button_zoom_in.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_zoom_in.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_zoom_in.setAttribute('style',hs);
		this._button_zoom_in__img=document.createElement('img');
		this._button_zoom_in__img.setAttribute('src','images/button_zoom_in.svg');
		this._button_zoom_in__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._button_zoom_in.appendChild(this._button_zoom_in__img);
		this._button_zoom_in.onmouseover=function () {
			me._button_zoom_in__img.src='images/button_zoom_in__o.svg';
		}
		this._button_zoom_in.onmouseout=function () {
			me._button_zoom_in__img.src='images/button_zoom_in.svg';
			me.elementMouseDown['button_zoom_in']=false;
		}
		this._button_zoom_in.onmousedown=function () {
			me.elementMouseDown['button_zoom_in']=true;
		}
		this._button_zoom_in.onmouseup=function () {
			me.elementMouseDown['button_zoom_in']=false;
		}
		this._button_zoom_in.ontouchend=function () {
			me.elementMouseDown['button_zoom_in']=false;
		}
		this._buttons_container.appendChild(this._button_zoom_in);
		this._button_zoom_out=document.createElement('div');
		this._button_zoom_out.ggId='button_zoom_out'
		this._button_zoom_out.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_zoom_out.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 50px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_zoom_out.setAttribute('style',hs);
		this._button_zoom_out__img=document.createElement('img');
		this._button_zoom_out__img.setAttribute('src','images/button_zoom_out.svg');
		this._button_zoom_out__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._button_zoom_out.appendChild(this._button_zoom_out__img);
		this._button_zoom_out.onmouseover=function () {
			me._button_zoom_out__img.src='images/button_zoom_out__o.svg';
		}
		this._button_zoom_out.onmouseout=function () {
			me._button_zoom_out__img.src='images/button_zoom_out.svg';
			me.elementMouseDown['button_zoom_out']=false;
		}
		this._button_zoom_out.onmousedown=function () {
			me.elementMouseDown['button_zoom_out']=true;
		}
		this._button_zoom_out.onmouseup=function () {
			me.elementMouseDown['button_zoom_out']=false;
		}
		this._button_zoom_out.ontouchend=function () {
			me.elementMouseDown['button_zoom_out']=false;
		}
		this._buttons_container.appendChild(this._button_zoom_out);
		this._button_home=document.createElement('div');
		this._button_home.ggId='button_home'
		this._button_home.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_home.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 100px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_home.setAttribute('style',hs);
		this._button_home__img=document.createElement('img');
		this._button_home__img.setAttribute('src','images/button_home.svg');
		this._button_home__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._button_home.appendChild(this._button_home__img);
		this._button_home.onclick=function () {
			me.player.moveToDefaultView(10);
		}
		this._button_home.onmouseover=function () {
			me._button_home__img.src='images/button_home__o.svg';
		}
		this._button_home.onmouseout=function () {
			me._button_home__img.src='images/button_home.svg';
		}
		this._buttons_container.appendChild(this._button_home);
		this._button_full_screen=document.createElement('div');
		this._button_full_screen.ggId='button_full_screen'
		this._button_full_screen.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_full_screen.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 150px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_full_screen.setAttribute('style',hs);
		this._button_full_screen__img=document.createElement('img');
		this._button_full_screen__img.setAttribute('src','images/button_full_screen.svg');
		this._button_full_screen__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._button_full_screen.appendChild(this._button_full_screen__img);
		this._button_full_screen.onclick=function () {
			me.player.toggleFullscreen();
		}
		this._button_full_screen.onmouseover=function () {
			me._button_full_screen__img.src='images/button_full_screen__o.svg';
		}
		this._button_full_screen.onmouseout=function () {
			me._button_full_screen__img.src='images/button_full_screen.svg';
		}
		this._buttons_container.appendChild(this._button_full_screen);
		this._button_map=document.createElement('div');
		this._button_map.ggId='button_map'
		this._button_map.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_map.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 200px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_map.setAttribute('style',hs);
		this._button_map__img=document.createElement('img');
		this._button_map__img.setAttribute('src','images/button_map.svg');
		this._button_map__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._button_map.appendChild(this._button_map__img);
		this._button_map.onclick=function () {
			flag=me._nav_map.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._nav_map.style.webkitTransition='none';
			} else {
				me._nav_map.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._nav_map.ggParameter.rx=0;me._nav_map.ggParameter.ry=0;
				me._nav_map.style.webkitTransform=parameterToTransform(me._nav_map.ggParameter);
			} else {
				me._nav_map.ggParameter.rx=-240;me._nav_map.ggParameter.ry=0;
				me._nav_map.style.webkitTransform=parameterToTransform(me._nav_map.ggParameter);
			}
			me._nav_map.ggPositonActive=!flag;
		}
		this._button_map.onmouseover=function () {
			me._button_map__img.src='images/button_map__o.svg';
		}
		this._button_map.onmouseout=function () {
			me._button_map__img.src='images/button_map.svg';
		}
		this._buttons_container.appendChild(this._button_map);
		this._sound=document.createElement('div');
		this._sound.ggId='sound'
		this._sound.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._sound.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 250px;';
		hs+='top:  1px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this._sound.setAttribute('style',hs);
		this._play=document.createElement('div');
		this._play.ggId='play'
		this._play.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._play.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this._play.setAttribute('style',hs);
		this._play__img=document.createElement('img');
		this._play__img.setAttribute('src','images/play.svg');
		this._play__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._play.appendChild(this._play__img);
		this._play.onclick=function () {
			me.player.playSound("Donau","0");
			me._play.style.webkitTransition='none';
			me._play.style.visibility='hidden';
			me._play.ggVisible=false;
			me._pause.style.webkitTransition='none';
			me._pause.style.visibility='inherit';
			me._pause.ggVisible=true;
		}
		this._play.onmouseover=function () {
			me._play__img.src='images/play__o.svg';
		}
		this._play.onmouseout=function () {
			me._play__img.src='images/play.svg';
		}
		this._sound.appendChild(this._play);
		this._pause=document.createElement('div');
		this._pause.ggId='pause'
		this._pause.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._pause.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._pause.setAttribute('style',hs);
		this._pause__img=document.createElement('img');
		this._pause__img.setAttribute('src','images/pause.svg');
		this._pause__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._pause.appendChild(this._pause__img);
		this._pause.onclick=function () {
			me.player.pauseSound("Donau");
			me._pause.style.webkitTransition='none';
			me._pause.style.visibility='hidden';
			me._pause.ggVisible=false;
			me._play.style.webkitTransition='none';
			me._play.style.visibility='inherit';
			me._play.ggVisible=true;
		}
		this._pause.onmouseover=function () {
			me._pause__img.src='images/pause__o.svg';
		}
		this._pause.onmouseout=function () {
			me._pause__img.src='images/pause.svg';
		}
		this._sound.appendChild(this._pause);
		this._buttons_container.appendChild(this._sound);
		this.divSkin.appendChild(this._buttons_container);
		this._lensflare=document.createElement('div');
		this._lensflare.ggId='lensflare'
		this._lensflare.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._lensflare.ggVisible=true;
		this._lensflare.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			h=this.parentNode.offsetHeight;
			this.style.top=(-48 + h) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: 56px;';
		hs+='top:  -48px;';
		hs+='width: 40px;';
		hs+='height: 40px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._lensflare.setAttribute('style',hs);
		this.divSkin.appendChild(this._lensflare);
		this._screen_tint=document.createElement('div');
		this._screen_tint.ggId='screen_tint'
		this._screen_tint.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._screen_tint.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 139px;';
		hs+='top:  568px;';
		hs+='width: 5000px;';
		hs+='height: 5000px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='opacity: 0;';
		hs+='visibility: hidden;';
		hs+='border: 0px solid #000000;';
		hs+='background-image:url(images/alpha_background_000000_150.png);';
		this._screen_tint.setAttribute('style',hs);
		this.divSkin.appendChild(this._screen_tint);
		this._video_bg=document.createElement('div');
		this._video_bg.ggId='video_bg'
		this._video_bg.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._video_bg.ggVisible=true;
		this._video_bg.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-332 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-232 + h/2) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -332px;';
		hs+='top:  -232px;';
		hs+='width: 655px;';
		hs+='height: 405px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='opacity: 0;';
		hs+='visibility: hidden;';
		hs+='border: 5px solid #000000;';
		hs+='border-radius: 20px;';
		hs+='-webkit-border-radius: 20px;';
		hs+='-moz-border-radius: 20px;';
		hs+='background-image:url(images/alpha_background_ffffff_150.png);';
		this._video_bg.setAttribute('style',hs);
		this._video=document.createElement('div');
		this._video.ggId='video'
		this._video.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._video.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 6px;';
		hs+='top:  5px;';
		hs+='width: 640px;';
		hs+='height: 390px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._video.setAttribute('style',hs);
		this._video_bg.appendChild(this._video);
		this._close_video=document.createElement('div');
		this._close_video.ggId='close_video'
		this._close_video.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._close_video.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 613px;';
		hs+='top:  6px;';
		hs+='width: 32px;';
		hs+='height: 32px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._close_video.setAttribute('style',hs);
		this._close_video__img=document.createElement('img');
		this._close_video__img.setAttribute('src','images/close_video.svg');
		this._close_video__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
		this._close_video.appendChild(this._close_video__img);
		this._close_video.onclick=function () {
			me._video_bg.style.webkitTransition='none';
			me._video_bg.style.opacity='0';
			me._video_bg.style.visibility='hidden';
			me._video.style.webkitTransition='none';
			me._video.style.visibility='hidden';
			me._video.ggVisible=false;
			me._screen_tint.style.webkitTransition='none';
			me._screen_tint.style.opacity='0';
			me._screen_tint.style.visibility='hidden';
		}
		this._close_video.onmouseover=function () {
			me._close_video__img.src='images/close_video__o.svg';
		}
		this._close_video.onmouseout=function () {
			me._close_video__img.src='images/close_video.svg';
		}
		this._video_bg.appendChild(this._close_video);
		this.divSkin.appendChild(this._video_bg);
		this._video_stopsound=document.createElement('div');
		this._video_stopsound.ggId='video_stopsound'
		this._video_stopsound.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._video_stopsound.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._video_stopsound.setAttribute('style',hs);
		this._video_stopsound.onclick=function () {
			me.player.pauseSound("Donau");
			me._play.style.webkitTransition='none';
			me._play.style.visibility='inherit';
			me._play.ggVisible=true;
			me._pause.style.webkitTransition='none';
			me._pause.style.visibility='hidden';
			me._pause.ggVisible=false;
		}
		this.divSkin.appendChild(this._video_stopsound);
		this._loading=document.createElement('div');
		this._loading.ggId='loading'
		this._loading.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading.ggVisible=true;
		this._loading.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-105 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-30 + h/2) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -105px;';
		hs+='top:  -30px;';
		hs+='width: 210px;';
		hs+='height: 60px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._loading.setAttribute('style',hs);
		this._loading.onclick=function () {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='hidden';
			me._loading.ggVisible=false;
		}
		this._loadingbg=document.createElement('div');
		this._loadingbg.ggId='loadingbg'
		this._loadingbg.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingbg.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 210px;';
		hs+='height: 60px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		hs+='background-color: #000000;';
		this._loadingbg.setAttribute('style',hs);
		this._loading.appendChild(this._loadingbg);
		this._loadingbrd=document.createElement('div');
		this._loadingbrd.ggId='loadingbrd'
		this._loadingbrd.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingbrd.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -1px;';
		hs+='top:  -1px;';
		hs+='width: 208px;';
		hs+='height: 58px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='border: 2px solid #ffffff;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		this._loadingbrd.setAttribute('style',hs);
		this._loading.appendChild(this._loadingbrd);
		this._loadingtext=document.createElement('div');
		this._loadingtext.ggId='loadingtext'
		this._loadingtext.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingtext.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 16px;';
		hs+='top:  12px;';
		hs+='width: auto;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._loadingtext.setAttribute('style',hs);
		this._loadingtext.ggUpdateText=function() {
			this.innerHTML="Loading... "+(me.player.getPercentLoaded()*100.0).toFixed(0)+"%";
		}
		this._loadingtext.ggUpdateText();
		this._loading.appendChild(this._loadingtext);
		this._loadingbar=document.createElement('div');
		this._loadingbar.ggId='loadingbar'
		this._loadingbar.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingbar.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 15px;';
		hs+='top:  35px;';
		hs+='width: 181px;';
		hs+='height: 12px;';
		hs+='-webkit-transform-origin: 0% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 1px solid #808080;';
		hs+='border-radius: 5px;';
		hs+='-webkit-border-radius: 5px;';
		hs+='-moz-border-radius: 5px;';
		hs+='background-color: #ffffff;';
		this._loadingbar.setAttribute('style',hs);
		this._loading.appendChild(this._loadingbar);
		this.divSkin.appendChild(this._loading);
		this.__31=document.createElement('div');
		this.__31.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 31'
		this.__31.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__31.ggVisible=true;
		this.__31.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-91 + w) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -91px;';
		hs+='top:  0px;';
		hs+='width: 90px;';
		hs+='height: 19px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this.__31.setAttribute('style',hs);
		this.__31__img=document.createElement('img');
		this.__31__img.setAttribute('src','images/_31.png');
		this.__31__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__31__img);
		this.__31.appendChild(this.__31__img);
		this.__31.onclick=function () {
			me.player.openUrl("http:\/\/www.ugra.travel ","");
		}
		this.divSkin.appendChild(this.__31);
		this._nav_map=document.createElement('div');
		this._nav_map.ggId='nav_map'
		this._nav_map.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._nav_map.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 10px;';
		hs+='top:  10px;';
		hs+='width: 230px;';
		hs+='height: 317px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._nav_map.setAttribute('style',hs);
		this._map=document.createElement('div');
		this._map.ggId='map'
		this._map.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._map.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -16px;';
		hs+='top:  -10px;';
		hs+='width: 214px;';
		hs+='height: 267px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._map.setAttribute('style',hs);
		this._map__img=document.createElement('img');
		this._map__img.setAttribute('src','images/map.png');
		this._map__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._map__img);
		this._map.appendChild(this._map__img);
		this._mhs_01=document.createElement('div');
		this._mhs_01.ggId='mhs_01'
		this._mhs_01.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_01.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 110px;';
		hs+='top:  231px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_01.setAttribute('style',hs);
		this._mhs_01__img=document.createElement('img');
		this._mhs_01__img.setAttribute('src','images/mhs_01.svg');
		this._mhs_01__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_01.appendChild(this._mhs_01__img);
		this._mhs_01.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=110;me._mhs_loc.ggParameter.ry=231;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("vhod_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=42.2;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_01.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=0;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_01']=true;
		}
		this._mhs_01.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__1.style.webkitTransition='none';
			me.__1.style.visibility='inherit';
			me.__1.ggVisible=true;
			me._description1.style.webkitTransition='none';
			me._description1.style.visibility='hidden';
			me._description1.ggVisible=false;
			me.elementMouseOver['mhs_01']=false;
		}
		this._mhs_01.ontouchend=function () {
			me.elementMouseOver['mhs_01']=false;
		}
		this._map.appendChild(this._mhs_01);
		this._mhs_02=document.createElement('div');
		this._mhs_02.ggId='mhs_02'
		this._mhs_02.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_02.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 50px;';
		hs+='top:  130px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_02.setAttribute('style',hs);
		this._mhs_02__img=document.createElement('img');
		this._mhs_02__img.setAttribute('src','images/mhs_02.svg');
		this._mhs_02__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_02.appendChild(this._mhs_02__img);
		this._mhs_02.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=50;me._mhs_loc.ggParameter.ry=130;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("vena_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=5.1;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_02.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-104;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_02']=true;
		}
		this._mhs_02.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__4.style.webkitTransition='none';
			me.__4.style.visibility='hidden';
			me.__4.ggVisible=false;
			me._description4.style.webkitTransition='none';
			me._description4.style.visibility='hidden';
			me._description4.ggVisible=false;
			me.elementMouseOver['mhs_02']=false;
		}
		this._mhs_02.ontouchend=function () {
			me.elementMouseOver['mhs_02']=false;
		}
		this._map.appendChild(this._mhs_02);
		this._mhs_03=document.createElement('div');
		this._mhs_03.ggId='mhs_03'
		this._mhs_03.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_03.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 120px;';
		hs+='top:  88px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_03.setAttribute('style',hs);
		this._mhs_03__img=document.createElement('img');
		this._mhs_03__img.setAttribute('src','images/mhs_03.svg');
		this._mhs_03__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_03.appendChild(this._mhs_03__img);
		this._mhs_03.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=120;me._mhs_loc.ggParameter.ry=88;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("sovet_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=46.6;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='inherit';
			me._sound.ggVisible=true;
			me._play.onclick();
		}
		this._mhs_03.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-208;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_03']=true;
		}
		this._mhs_03.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__5.style.webkitTransition='none';
			me.__5.style.visibility='hidden';
			me.__5.ggVisible=false;
			me._description5.style.webkitTransition='none';
			me._description5.style.visibility='hidden';
			me._description5.ggVisible=false;
			me.elementMouseOver['mhs_03']=false;
		}
		this._mhs_03.ontouchend=function () {
			me.elementMouseOver['mhs_03']=false;
		}
		this._map.appendChild(this._mhs_03);
		this._mhs_04=document.createElement('div');
		this._mhs_04.ggId='mhs_04'
		this._mhs_04.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_04.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 57px;';
		hs+='top:  168px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_04.setAttribute('style',hs);
		this._mhs_04__img=document.createElement('img');
		this._mhs_04__img.setAttribute('src','images/mhs_04.svg');
		this._mhs_04__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_04.appendChild(this._mhs_04__img);
		this._mhs_04.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=57;me._mhs_loc.ggParameter.ry=168;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("trans_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-126.2;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_04.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-312;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_04']=true;
		}
		this._mhs_04.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__6.style.webkitTransition='none';
			me.__6.style.visibility='hidden';
			me.__6.ggVisible=false;
			me._description6.style.webkitTransition='none';
			me._description6.style.visibility='hidden';
			me._description6.ggVisible=false;
			me.elementMouseOver['mhs_04']=false;
		}
		this._mhs_04.ontouchend=function () {
			me.elementMouseOver['mhs_04']=false;
		}
		this._map.appendChild(this._mhs_04);
		this._mhs_05=document.createElement('div');
		this._mhs_05.ggId='mhs_05'
		this._mhs_05.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_05.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 62px;';
		hs+='top:  52px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_05.setAttribute('style',hs);
		this._mhs_05__img=document.createElement('img');
		this._mhs_05__img.setAttribute('src','images/mhs_05.svg');
		this._mhs_05__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_05.appendChild(this._mhs_05__img);
		this._mhs_05.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=62;me._mhs_loc.ggParameter.ry=52;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("organ_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_05.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_05']=true;
		}
		this._mhs_05.onmouseout=function () {
			me._kabinet1.style.webkitTransition='none';
			me._kabinet1.style.visibility='hidden';
			me._kabinet1.ggVisible=false;
			me.__71.style.webkitTransition='none';
			me.__71.style.visibility='hidden';
			me.__71.ggVisible=false;
			me._description71.style.webkitTransition='none';
			me._description71.style.visibility='hidden';
			me._description71.ggVisible=false;
			me.elementMouseOver['mhs_05']=false;
		}
		this._mhs_05.ontouchend=function () {
			me.elementMouseOver['mhs_05']=false;
		}
		this._map.appendChild(this._mhs_05);
		this._mhs_06=document.createElement('div');
		this._mhs_06.ggId='mhs_06'
		this._mhs_06.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_06.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 122px;';
		hs+='top:  160px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_06.setAttribute('style',hs);
		this._mhs_06__img=document.createElement('img');
		this._mhs_06__img.setAttribute('src','images/mhs_06.svg');
		this._mhs_06__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_06.appendChild(this._mhs_06__img);
		this._mhs_06.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=122;me._mhs_loc.ggParameter.ry=160;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("press_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_06.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_06']=true;
		}
		this._mhs_06.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__8.style.webkitTransition='none';
			me.__8.style.visibility='hidden';
			me.__8.ggVisible=false;
			me._description8.style.webkitTransition='none';
			me._description8.style.visibility='hidden';
			me._description8.ggVisible=false;
			me.elementMouseOver['mhs_06']=false;
		}
		this._mhs_06.ontouchend=function () {
			me.elementMouseOver['mhs_06']=false;
		}
		this._map.appendChild(this._mhs_06);
		this._mhs_07=document.createElement('div');
		this._mhs_07.ggId='mhs_07'
		this._mhs_07.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_07.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 25px;';
		hs+='top:  185px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_07.setAttribute('style',hs);
		this._mhs_07__img=document.createElement('img');
		this._mhs_07__img.setAttribute('src','images/mhs_07.svg');
		this._mhs_07__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_07.appendChild(this._mhs_07__img);
		this._mhs_07.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=25;me._mhs_loc.ggParameter.ry=185;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("ulic_ven_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_07.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_07']=true;
		}
		this._mhs_07.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__10.style.webkitTransition='none';
			me.__10.style.visibility='hidden';
			me.__10.ggVisible=false;
			me._description10.style.webkitTransition='none';
			me._description10.style.visibility='hidden';
			me._description10.ggVisible=false;
			me.elementMouseOver['mhs_07']=false;
		}
		this._mhs_07.ontouchend=function () {
			me.elementMouseOver['mhs_07']=false;
		}
		this._map.appendChild(this._mhs_07);
		this._mhs_08=document.createElement('div');
		this._mhs_08.ggId='mhs_08'
		this._mhs_08.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_08.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 91px;';
		hs+='top:  139px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_08.setAttribute('style',hs);
		this._mhs_08__img=document.createElement('img');
		this._mhs_08__img.setAttribute('src','images/mhs_08.svg');
		this._mhs_08__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_08.appendChild(this._mhs_08__img);
		this._mhs_08.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=91;me._mhs_loc.ggParameter.ry=139;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("2flot_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_08.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_08']=true;
		}
		this._mhs_08.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__12.style.webkitTransition='none';
			me.__12.style.visibility='hidden';
			me.__12.ggVisible=false;
			me._description12.style.webkitTransition='none';
			me._description12.style.visibility='hidden';
			me._description12.ggVisible=false;
			me.elementMouseOver['mhs_08']=false;
		}
		this._mhs_08.ontouchend=function () {
			me.elementMouseOver['mhs_08']=false;
		}
		this._map.appendChild(this._mhs_08);
		this._mhs_09=document.createElement('div');
		this._mhs_09.ggId='mhs_09'
		this._mhs_09.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_09.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 92px;';
		hs+='top:  191px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_09.setAttribute('style',hs);
		this._mhs_09__img=document.createElement('img');
		this._mhs_09__img.setAttribute('src','images/mhs_09.svg');
		this._mhs_09__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_09.appendChild(this._mhs_09__img);
		this._mhs_09.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=92;me._mhs_loc.ggParameter.ry=191;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("oniks_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_09.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_09']=true;
		}
		this._mhs_09.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__9.style.webkitTransition='none';
			me.__9.style.visibility='hidden';
			me.__9.ggVisible=false;
			me._description9.style.webkitTransition='none';
			me._description9.style.visibility='hidden';
			me._description9.ggVisible=false;
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__9.style.webkitTransition='none';
			me.__9.style.visibility='hidden';
			me.__9.ggVisible=false;
			me._description9.style.webkitTransition='none';
			me._description9.style.visibility='hidden';
			me._description9.ggVisible=false;
			me.elementMouseOver['mhs_09']=false;
		}
		this._mhs_09.ontouchend=function () {
			me.elementMouseOver['mhs_09']=false;
		}
		this._map.appendChild(this._mhs_09);
		this._mhs_10=document.createElement('div');
		this._mhs_10.ggId='mhs_10'
		this._mhs_10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_10.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 35px;';
		hs+='top:  25px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_10.setAttribute('style',hs);
		this._mhs_10__img=document.createElement('img');
		this._mhs_10__img.setAttribute('src','images/mhs_10.svg');
		this._mhs_10__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_10.appendChild(this._mhs_10__img);
		this._mhs_10.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=35;me._mhs_loc.ggParameter.ry=25;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("uli_len_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_10.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_10']=true;
		}
		this._mhs_10.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__11.style.webkitTransition='none';
			me.__11.style.visibility='hidden';
			me.__11.ggVisible=false;
			me._description11.style.webkitTransition='none';
			me._description11.style.visibility='hidden';
			me._description11.ggVisible=false;
			me.elementMouseOver['mhs_10']=false;
		}
		this._mhs_10.ontouchend=function () {
			me.elementMouseOver['mhs_10']=false;
		}
		this._map.appendChild(this._mhs_10);
		this._mhs_11=document.createElement('div');
		this._mhs_11.ggId='mhs_11'
		this._mhs_11.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_11.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 136px;';
		hs+='top:  123px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_11.setAttribute('style',hs);
		this._mhs_11__img=document.createElement('img');
		this._mhs_11__img.setAttribute('src','images/mhs_11.svg');
		this._mhs_11__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_11.appendChild(this._mhs_11__img);
		this._mhs_11.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=136;me._mhs_loc.ggParameter.ry=123;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("art_kafe_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_11.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_11']=true;
		}
		this._mhs_11.onmouseout=function () {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='hidden';
			me._kabinet.ggVisible=false;
			me.__2.style.webkitTransition='none';
			me.__2.style.visibility='hidden';
			me.__2.ggVisible=false;
			me._description2.style.webkitTransition='none';
			me._description2.style.visibility='hidden';
			me._description2.ggVisible=false;
			me.elementMouseOver['mhs_11']=false;
		}
		this._mhs_11.ontouchend=function () {
			me.elementMouseOver['mhs_11']=false;
		}
		this._map.appendChild(this._mhs_11);
		this._mhs_12=document.createElement('div');
		this._mhs_12.ggId='mhs_12'
		this._mhs_12.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_12.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 96px;';
		hs+='top:  65px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._mhs_12.setAttribute('style',hs);
		this._mhs_12__img=document.createElement('img');
		this._mhs_12__img.setAttribute('src','images/mhs_12.svg');
		this._mhs_12__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_12.appendChild(this._mhs_12__img);
		this._mhs_12.onclick=function () {
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.ggParameter.rx=96;me._mhs_loc.ggParameter.ry=65;
			me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.opacity='0';
			me._mhs_loc.style.visibility='hidden';
			me.player.openNext("zal_out.swf","");
			me.player.moveTo(me.player.getPanN().toFixed(1),me.player.getTilt().toFixed(1),me.player.getFov().toFixed(1),"");
			me._mhs_dot.style.webkitTransition='none';
			me._mhs_dot.ggParameter.a=-180;
			me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
			me._mhs_loc.style.webkitTransition='none';
			me._mhs_loc.style.visibility='hidden';
			me._mhs_loc.ggVisible=false;
			me._sound.style.webkitTransition='none';
			me._sound.style.visibility='hidden';
			me._sound.ggVisible=false;
		}
		this._mhs_12.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._thumbnails.style.webkitTransition='none';
			} else {
				me._thumbnails.style.webkitTransition='all 1000ms ease-out 0ms';
			}
			me._thumbnails.ggParameter.rx=-416;me._thumbnails.ggParameter.ry=0;
			me._thumbnails.style.webkitTransform=parameterToTransform(me._thumbnails.ggParameter);
			me.elementMouseOver['mhs_12']=true;
		}
		this._mhs_12.onmouseout=function () {
			me._kabinet1.style.webkitTransition='none';
			me._kabinet1.style.visibility='hidden';
			me._kabinet1.ggVisible=false;
			me.__311.style.webkitTransition='none';
			me.__311.style.visibility='hidden';
			me.__311.ggVisible=false;
			me._description311.style.webkitTransition='none';
			me._description311.style.visibility='hidden';
			me._description311.ggVisible=false;
			me.elementMouseOver['mhs_12']=false;
		}
		this._mhs_12.ontouchend=function () {
			me.elementMouseOver['mhs_12']=false;
		}
		this._map.appendChild(this._mhs_12);
		this._mhs_loc=document.createElement('div');
		this._mhs_loc.ggId='mhs_loc'
		this._mhs_loc.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_loc.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._mhs_loc.setAttribute('style',hs);
		this._mhs_loc__img=document.createElement('img');
		this._mhs_loc__img.setAttribute('src','images/mhs_loc.svg');
		this._mhs_loc__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_loc.appendChild(this._mhs_loc__img);
		this._mhs_dot=document.createElement('div');
		this._mhs_dot.ggId='mhs_dot'
		this._mhs_dot.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._mhs_dot.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._mhs_dot.setAttribute('style',hs);
		this._mhs_dot__img=document.createElement('img');
		this._mhs_dot__img.setAttribute('src','images/mhs_dot.svg');
		this._mhs_dot__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 30px;height: 30px;');
		this._mhs_dot.appendChild(this._mhs_dot__img);
		this._mhs_loc.appendChild(this._mhs_dot);
		this._map.appendChild(this._mhs_loc);
		this._nav_map.appendChild(this._map);
		this._container_thumbnails=document.createElement('div');
		this._container_thumbnails.ggId='container_thumbnails'
		this._container_thumbnails.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._container_thumbnails.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 41px;';
		hs+='top:  4px;';
		hs+='width: 104px;';
		hs+='height: 84px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		hs+='overflow: hidden;';
		this._container_thumbnails.setAttribute('style',hs);
		this._thumb_bg=document.createElement('div');
		this._thumb_bg.ggId='thumb_bg'
		this._thumb_bg.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_bg.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 1px;';
		hs+='top:  1px;';
		hs+='width: 102px;';
		hs+='height: 82px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 2px solid #ffffff;';
		hs+='background-color: #ffffff;';
		this._thumb_bg.setAttribute('style',hs);
		this._container_thumbnails.appendChild(this._thumb_bg);
		this._thumbnails=document.createElement('div');
		this._thumbnails.ggId='thumbnails'
		this._thumbnails.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumbnails.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 2px;';
		hs+='top:  2px;';
		hs+='width: 516px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._thumbnails.setAttribute('style',hs);
		this._thumb_01=document.createElement('div');
		this._thumb_01.ggId='thumb_01'
		this._thumb_01.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_01.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 100px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._thumb_01.setAttribute('style',hs);
		this._thumb_01__img=document.createElement('img');
		this._thumb_01__img.setAttribute('src','images/thumb_01.png');
		this._thumb_01__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._thumb_01__img);
		this._thumb_01.appendChild(this._thumb_01__img);
		this._thumbnails.appendChild(this._thumb_01);
		this._thumb_02=document.createElement('div');
		this._thumb_02.ggId='thumb_02'
		this._thumb_02.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_02.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 104px;';
		hs+='top:  0px;';
		hs+='width: 100px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._thumb_02.setAttribute('style',hs);
		this._thumb_02__img=document.createElement('img');
		this._thumb_02__img.setAttribute('src','images/thumb_02.png');
		this._thumb_02__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._thumb_02__img);
		this._thumb_02.appendChild(this._thumb_02__img);
		this._thumbnails.appendChild(this._thumb_02);
		this._thumb_03=document.createElement('div');
		this._thumb_03.ggId='thumb_03'
		this._thumb_03.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_03.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 208px;';
		hs+='top:  0px;';
		hs+='width: 100px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._thumb_03.setAttribute('style',hs);
		this._thumb_03__img=document.createElement('img');
		this._thumb_03__img.setAttribute('src','images/thumb_03.png');
		this._thumb_03__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._thumb_03__img);
		this._thumb_03.appendChild(this._thumb_03__img);
		this._thumbnails.appendChild(this._thumb_03);
		this._thumb_04=document.createElement('div');
		this._thumb_04.ggId='thumb_04'
		this._thumb_04.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_04.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 312px;';
		hs+='top:  0px;';
		hs+='width: 100px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._thumb_04.setAttribute('style',hs);
		this._thumb_04__img=document.createElement('img');
		this._thumb_04__img.setAttribute('src','images/thumb_04.png');
		this._thumb_04__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._thumb_04__img);
		this._thumb_04.appendChild(this._thumb_04__img);
		this._thumbnails.appendChild(this._thumb_04);
		this._thumb_05=document.createElement('div');
		this._thumb_05.ggId='thumb_05'
		this._thumb_05.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._thumb_05.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 416px;';
		hs+='top:  0px;';
		hs+='width: 100px;';
		hs+='height: 80px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._thumb_05.setAttribute('style',hs);
		this._thumb_05__img=document.createElement('img');
		this._thumb_05__img.setAttribute('src','images/thumb_05.png');
		this._thumb_05__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._thumb_05__img);
		this._thumb_05.appendChild(this._thumb_05__img);
		this._thumbnails.appendChild(this._thumb_05);
		this._container_thumbnails.appendChild(this._thumbnails);
		this._nav_map.appendChild(this._container_thumbnails);
		this._text_270=document.createElement('div');
		this._text_270.ggId='Text 27'
		this._text_270.ggParameter={ rx:0,ry:0,a:0,sx:1.2,sy:1.2 };
		this._text_270.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 5px;';
		hs+='top:  91px;';
		hs+='width: auto;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 0% 0%;';
		hs+='-webkit-transform: ' + parameterToTransform(this._text_270.ggParameter) + ';';
		hs+='visibility: hidden;';
		hs+='border: 0px solid #000000;';
		hs+='color: #000000;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._text_270.setAttribute('style',hs);
		this._text_270.innerHTML="Preview";
		this._nav_map.appendChild(this._text_270);
		this._text_27=document.createElement('div');
		this._text_27.ggId='Text 27'
		this._text_27.ggParameter={ rx:0,ry:0,a:0,sx:1.2,sy:1.2 };
		this._text_27.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 4px;';
		hs+='top:  90px;';
		hs+='width: auto;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 0% 0%;';
		hs+='-webkit-transform: ' + parameterToTransform(this._text_27.ggParameter) + ';';
		hs+='visibility: hidden;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._text_27.setAttribute('style',hs);
		this._text_27.innerHTML="Preview";
		this._nav_map.appendChild(this._text_27);
		this.divSkin.appendChild(this._nav_map);
		this._kabinet=document.createElement('div');
		this._kabinet.ggId='kabinet'
		this._kabinet.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._kabinet.ggVisible=false;
		this._kabinet.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-300 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-370 + h/2) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -300px;';
		hs+='top:  -370px;';
		hs+='width: 618px;';
		hs+='height: 592px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		hs+='overflow: hidden;';
		this._kabinet.setAttribute('style',hs);
		this._userdatabg0=document.createElement('div');
		this._userdatabg0.ggId='userdatabg'
		this._userdatabg0.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._userdatabg0.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  7px;';
		hs+='width: 614px;';
		hs+='height: 577px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		hs+='background-color: #000000;';
		this._userdatabg0.setAttribute('style',hs);
		this._kabinet.appendChild(this._userdatabg0);
		this._userdatabrd0=document.createElement('div');
		this._userdatabrd0.ggId='userdatabrd'
		this._userdatabrd0.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._userdatabrd0.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -1px;';
		hs+='top:  7px;';
		hs+='width: 612px;';
		hs+='height: 576px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 2px solid #ffffff;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		this._userdatabrd0.setAttribute('style',hs);
		this.__1=document.createElement('div');
		this.__1.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 1'
		this.__1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__1.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__1.setAttribute('style',hs);
		this.__1__img=document.createElement('img');
		this.__1__img.setAttribute('src','images/_1.jpg');
		this.__1__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__1__img);
		this.__1.appendChild(this.__1__img);
		this._description1=document.createElement('div');
		this._description1.ggId='description1'
		this._description1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description1.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description1.setAttribute('style',hs);
		this._description1.innerHTML="\u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439 \u0446\u0435\u043d\u0442\u0440 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb  \u043e\u0442\u043a\u0440\u044b\u0442 \u0432 \u0414\u0435\u043d\u044c \u0430\u0432\u0442\u043e\u043d\u043e\u043c\u043d\u043e\u0433\u043e \u043e\u043a\u0440\u0443\u0433\u0430 \u2013 10 \u0434\u0435\u043a\u0430\u0431\u0440\u044f 2004 \u0433\u043e\u0434\u0430. \u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u0438 \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0442 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u044f\u0442\u044c \u043a\u0443\u043b\u044c\u0442\u0443\u0440\u043d\u044b\u0435 \u043f\u0440\u043e\u0435\u043a\u0442\u044b \u043a\u0430\u043a \u0440\u043e\u0441\u0441\u0438\u0439\u0441\u043a\u043e\u0433\u043e, \u0442\u0430\u043a \u0438 \u043c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u0433\u043e \u043c\u0430\u0441\u0448\u0442\u0430\u0431\u0430. \u041e\u0431\u0449\u0430\u044f \u043f\u043b\u043e\u0449\u0430\u0434\u044c \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 (18 \u0442\u044b\u0441. \u043a\u0432. \u043c\u0435\u0442\u0440\u043e\u0432) \u0432\u043a\u043b\u044e\u0447\u0430\u0435\u0442 4 \u0437\u0430\u043b\u0430, \u0430\u0440\u0442-\u0441\u0430\u043b\u043e\u043d, \u043a\u043b\u0443\u0431-\u0440\u0435\u0441\u0442\u043e\u0440\u0430\u043d \xab\u0410\u043c\u0430\u0434\u0435\u0443\u0441\xbb, \u0437\u0430\u043b \xabRoyal\xbb,  \u0433\u043e\u0441\u0442\u0438\u043d\u0438\u0446\u0443 \u043d\u0430 30 \u043c\u0435\u0441\u0442, \u0437\u0438\u043c\u043d\u044e\u044e \u043f\u0430\u0440\u043a\u043e\u0432\u043a\u0443 \u043d\u0430 70 \u043c\u0435\u0441\u0442 \u0438 \u043e\u0444\u0438\u0441\u043d\u044b\u0435 \u043f\u043e\u043c\u0435\u0449\u0435\u043d\u0438\u044f.\n\u0410\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u0443\u0440\u043d\u044b\u0439 \u043f\u0440\u043e\u0435\u043a\u0442 \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb (\u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440 \u0421\u0432\u0435\u0442\u043b\u0430\u043d\u0430 \u041f\u0435\u0439\u0434\u0430) \u0431\u044b\u043b \u043e\u0442\u043c\u0435\u0447\u0435\u043d \u0437\u043e\u043b\u043e\u0442\u044b\u043c \u0434\u0438\u043f\u043b\u043e\u043c\u043e\u043c \u0444\u0435\u0441\u0442\u0438\u0432\u0430\u043b\u044f \xab\u0417\u043e\u0434\u0447\u0435\u0441\u0442\u0432\u043e\xbb (\u0433.\u041c\u043e\u0441\u043a\u0432\u0430) \u0438 \u0441\u0435\u0440\u0435\u0431\u0440\u044f\u043d\u043e\u0439 \u043c\u0435\u0434\u0430\u043b\u044c\u044e \u043d\u0430 \u041c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u043c \u043a\u043e\u043d\u043a\u0443\u0440\u0441\u0435 \u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440\u043e\u0432 \u0432 \u0411\u043e\u043b\u0433\u0430\u0440\u0438\u0438. \n";
		this.__1.appendChild(this._description1);
		this._userdatabrd0.appendChild(this.__1);
		this.__2=document.createElement('div');
		this.__2.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 2'
		this.__2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__2.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__2.setAttribute('style',hs);
		this.__2__img=document.createElement('img');
		this.__2__img.setAttribute('src','images/_2.jpg');
		this.__2__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__2__img);
		this.__2.appendChild(this.__2__img);
		this._description2=document.createElement('div');
		this._description2.ggId='description2'
		this._description2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description2.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description2.setAttribute('style',hs);
		this._description2.innerHTML="\u0410\u0440\u0442-\u0441\u0430\u043b\u043e\u043d \u2013 \u044d\u0442\u043e \u043c\u043d\u043e\u0433\u043e\u0444\u0443\u043d\u043a\u0446\u0438\u043e\u043d\u0430\u043b\u044c\u043d\u043e\u0435 \u043f\u0440\u043e\u0441\u0442\u0440\u0430\u043d\u0441\u0442\u0432\u043e, \u043f\u0440\u0438\u0437\u0432\u0430\u043d\u043d\u043e\u0435 \u0441\u043e\u0437\u0434\u0430\u0442\u044c \u043a\u043e\u043c\u0444\u043e\u0440\u0442 \u0437\u0440\u0438\u0442\u0435\u043b\u044f\u043c \u0426\u0435\u043d\u0442\u0440\u0430 \u0432 \u043f\u0440\u0435\u0434\u0434\u0432\u0435\u0440\u0438\u0438 \u0434\u0435\u0439\u0441\u0442\u0432\u0430 \u0438\u043b\u0438 \u0432\u043e \u0432\u0440\u0435\u043c\u044f \u0430\u043d\u0442\u0440\u0430\u043a\u0442\u0430. \u0412 \u0410\u0440\u0442-\u0441\u0430\u043b\u043e\u043d\u0435 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u043f\u0440\u0435\u0437\u0435\u043d\u0442\u0430\u0446\u0438\u0438 \u0438 \u0442\u043e\u0440\u0436\u0435\u0441\u0442\u0432\u0435\u043d\u043d\u044b\u0435 \u043f\u0440\u0438\u0435\u043c\u044b";
		this.__2.appendChild(this._description2);
		this._userdatabrd0.appendChild(this.__2);
		this.__3=document.createElement('div');
		this.__3.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 3'
		this.__3.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__3.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__3.setAttribute('style',hs);
		this.__3__img=document.createElement('img');
		this.__3__img.setAttribute('src','images/_3.jpg');
		this.__3__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__3__img);
		this.__3.appendChild(this.__3__img);
		this._description3=document.createElement('div');
		this._description3.ggId='description3'
		this._description3.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description3.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description3.setAttribute('style',hs);
		this._description3.innerHTML="\u0411\u043e\u043b\u044c\u0448\u043e\u0439 \u0437\u0430\u043b \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u0440\u0430\u0441\u0441\u0447\u0438\u0442\u0430\u043d \u043d\u0430 1000 \u043c\u0435\u0441\u0442. \u0410\u043a\u0443\u0441\u0442\u0438\u0447\u0435\u0441\u043a\u0438\u0435 \u0437\u0440\u0438\u0442\u0435\u043b\u044c\u0441\u043a\u0438\u0435 \u043a\u0440\u0435\u0441\u043b\u0430 \u0438\u0437\u0433\u043e\u0442\u043e\u0432\u043b\u0435\u043d\u044b \u0432 \u0418\u0442\u0430\u043b\u0438\u0438. \u0420\u0430\u0431\u043e\u0447\u0430\u044f \u0433\u043b\u0443\u0431\u0438\u043d\u0430 \u0441\u0446\u0435\u043d\u044b 18,5 \u043c, \u0448\u0438\u0440\u0438\u043d\u0430 18 \u043c, \u0434\u0438\u0430\u043c\u0435\u0442\u0440 \u043f\u043e\u0432\u043e\u0440\u043e\u0442\u043d\u043e\u0433\u043e \u043a\u0440\u0443\u0433\u0430 11 \u043c, \u0437\u0435\u0440\u043a\u0430\u043b\u043e \u0441\u0446\u0435\u043d\u044b 7,6 \u043c \u043d\u0430 18 \u043c. \u041a\u043e\u043d\u0441\u0442\u0440\u0443\u043a\u0446\u0438\u044f \u0437\u0430\u043b\u0430 \u0438 \u0435\u0433\u043e \u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u043e\u0441\u043d\u0430\u0449\u0435\u043d\u0438\u0435 \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0442 \u043f\u043e\u0434\u043d\u0438\u043c\u0430\u0442\u044c \u043f\u0430\u0440\u0442\u0435\u0440 \u0434\u043e \u0443\u0440\u043e\u0432\u043d\u044f \u0441\u0446\u0435\u043d\u044b \u0438 \u043f\u0435\u0440\u0432\u043e\u0433\u043e \u0440\u044f\u0434\u0430 \u0430\u043c\u0444\u0438\u0442\u0435\u0430\u0442\u0440\u0430. \u0422\u0430\u043a\u0438\u043c \u043e\u0431\u0440\u0430\u0437\u043e\u043c, \u0441\u0446\u0435\u043d\u0430 \u0443\u0432\u0435\u043b\u0438\u0447\u0438\u0432\u0430\u0435\u0442\u0441\u044f \u0432 \u0433\u043b\u0443\u0431\u0438\u043d\u0443 \u043f\u043e\u0447\u0442\u0438 \u043d\u0430 10,5 \u043c. 16 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043c\u0435\u0445\u0430\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0445 \u0438 19 \u0440\u0443\u0447\u043d\u044b\u0445 \u0448\u0442\u0430\u043d\u043a\u0435\u0442\u043e\u0432, \u0441\u043e\u0432\u0440\u0435\u043c\u0435\u043d\u043d\u043e\u0435 \u0441\u0432\u0435\u0442\u043e\u0432\u043e\u0435 \u0438 \u0437\u0432\u0443\u043a\u043e\u0432\u043e\u0435 \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d\u0438\u0435 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0438\u0432\u0430\u044e\u0442 \u0432\u044b\u0441\u043e\u043a\u0438\u0439 \u0443\u0440\u043e\u0432\u0435\u043d\u044c \u043f\u0440\u043e\u0432\u043e\u0434\u0438\u043c\u044b\u0445 \u043c\u0435\u0440\u043e\u043f\u0440\u0438\u044f\u0442\u0438\u0439. \u0417\u0430\u043b \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d \u043f\u0440\u043e\u0444\u0435\u0441\u0441\u0438\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u043c \u043a\u0438\u043d\u043e\u043f\u0440\u043e\u0435\u043a\u0442\u043e\u0440\u043e\u043c  HERNON 15 Digital Audio, \u0437\u0432\u0443\u043a\u043e\u043c \u0441\u0438\u0441\u0442\u0435\u043c\u044b Dolby, 4-\u043c\u044f \u0440\u0430\u0437\u043d\u043e\u0444\u043e\u0440\u043c\u0430\u0442\u043d\u044b\u043c\u0438 \u044d\u043a\u0440\u0430\u043d\u0430\u043c\u0438, \u0432 \u0442\u043e\u043c \u0447\u0438\u0441\u043b\u0435 \u0441\u0438\u0441\u0442\u0435\u043c\u043e\u0439, \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0449\u0435\u0439 \u0432\u043e\u0441\u043f\u0440\u043e\u0438\u0437\u0432\u043e\u0434\u0438\u0442\u044c \u0444\u0438\u043b\u044c\u043c\u044b \u0432 \u0444\u043e\u0440\u043c\u0430\u0442\u0435 3D. \u041a \u0443\u0441\u043b\u0443\u0433\u0430\u043c \u0430\u0440\u0442\u0438\u0441\u0442\u043e\u0432 16 \u043f\u0440\u043e\u0441\u0442\u043e\u0440\u043d\u044b\u0445 \u043a\u043e\u043c\u0444\u043e\u0440\u0442\u0430\u0431\u0435\u043b\u044c\u043d\u044b\u0445 \u0433\u0440\u0438\u043c\u0435\u0440\u043d\u044b\u0445 \u043a\u043e\u043c\u043d\u0430\u0442.\n\u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u0438 \u0438 \u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u0441\u043e\u0432\u0435\u0440\u0448\u0435\u043d\u0441\u0442\u0432\u043e \u0411\u043e\u043b\u044c\u0448\u043e\u0433\u043e \u0437\u0430\u043b\u0430 \u043e\u0446\u0435\u043d\u0438\u043b\u0438 \u0432\u0435\u0434\u0443\u0449\u0438\u0435 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0435 \u0438 \u043c\u0443\u0437\u044b\u043a\u0430\u043b\u044c\u043d\u044b\u0435 \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432\u044b \u0420\u043e\u0441\u0441\u0438\u0438 \u0438 \u041c\u0438\u0440\u0430.\n\xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u043e\u0442\u043a\u0440\u044b\u0432\u0430\u0435\u0442 \u0441\u0432\u043e\u0438 \u0434\u0432\u0435\u0440\u0438 \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u043d\u0435\u0439\u0448\u0438\u043c \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u044b\u043c \u0438 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432\u0430\u043c \u043d\u0430\u0448\u0435\u0439 \u0441\u0442\u0440\u0430\u043d\u044b. \u041d\u0430 \u044d\u0442\u043e\u0439 \u0441\u0446\u0435\u043d\u0435 \u0432\u044b\u0441\u0442\u0443\u043f\u0430\u043b\u0438 \u043c\u0443\u0437\u044b\u043a\u0430\u043d\u0442\u044b \u0438 \u0430\u043a\u0442\u0435\u0440\u044b, \u0447\u044c\u0438 \u0438\u043c\u0435\u043d\u0430 \u0438\u0437\u0432\u0435\u0441\u0442\u043d\u044b \u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u0438 \u0434\u0430\u043b\u0435\u043a\u043e \u0437\u0430 \u0435\u0435 \u043f\u0440\u0435\u0434\u0435\u043b\u0430\u043c\u0438. \u042d\u0442\u043e\u0442 \u0437\u0430\u043b \u0440\u0443\u043a\u043e\u043f\u043b\u0435\u0441\u043a\u0430\u043b \u0437\u0432\u0435\u0437\u0434\u0430\u043c \u043c\u0438\u0440\u043e\u0432\u043e\u0439 \u0432\u0435\u043b\u0438\u0447\u0438\u043d\u044b: \u043e\u043f\u0435\u0440\u043d\u0430\u044f \u0438 \u0431\u0430\u043b\u0435\u0442\u043d\u0430\u044f \u0442\u0440\u0443\u043f\u043f\u0430 \u041c\u0430\u0440\u0438\u0438\u043d\u0441\u043a\u043e\u0433\u043e \u0442\u0435\u0430\u0442\u0440\u0430 \u0432\u043e \u0433\u043b\u0430\u0432\u0435 \u0441 \u041c\u0430\u044d\u0441\u0442\u0440\u043e \u0412\u0430\u043b\u0435\u0440\u0438\u0435\u043c \u0413\u0435\u0440\u0433\u0438\u0435\u0432\u044b\u043c, \u0417\u0430\u0441\u043b\u0443\u0436\u0435\u043d\u043d\u044b\u0439 \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u0410\u043a\u0430\u0434\u0435\u043c\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0441\u0438\u043c\u0444\u043e\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u043e\u0440\u043a\u0435\u0441\u0442\u0440 \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433\u0441\u043a\u043e\u0439 \u0444\u0438\u043b\u0430\u0440\u043c\u043e\u043d\u0438\u0438 \u043f\u043e\u0434 \u0443\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435\u043c \u042e\u0440\u0438\u044f \u0422\u0435\u043c\u0438\u0440\u043a\u0430\u043d\u043e\u0432\u0430, \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439 \u0445\u0443\u0434\u043e\u0436\u0435\u0441\u0442\u0432\u0435\u043d\u043d\u044b\u0439 \u0442\u0435\u0430\u0442\u0440 \u0438\u043c. \u0427\u0435\u0445\u043e\u0432\u0430, \u041c\u0430\u043b\u044b\u0439 \u0442\u0435\u0430\u0442\u0440-\u0442\u0435\u0430\u0442\u0440 \u0415\u0432\u0440\u043e\u043f\u044b \u041b\u044c\u0432\u0430 \u0414\u043e\u0434\u0438\u043d\u0430, \u0422\u0435\u0430\u0442\u0440 \xab\u041f\u0438\u043a\u043a\u043e\u043b\u043e \u0434\u0438 \u041c\u0438\u043b\u0430\u043d\u043e\xbb \u0438 \u043c\u043d\u043e\u0433\u0438\u0435 \u0434\u0440\u0443\u0433\u0438\u0435.\n";
		this.__3.appendChild(this._description3);
		this._userdatabrd0.appendChild(this.__3);
		this.__4=document.createElement('div');
		this.__4.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 4'
		this.__4.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__4.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__4.setAttribute('style',hs);
		this.__4__img=document.createElement('img');
		this.__4__img.setAttribute('src','images/_4.jpg');
		this.__4__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__4__img);
		this.__4.appendChild(this.__4__img);
		this._description4=document.createElement('div');
		this._description4.ggId='description4'
		this._description4.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description4.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description4.setAttribute('style',hs);
		this._description4.innerHTML="\u041a\u043b\u0443\u0431-\u0440\u0435\u0441\u0442\u043e\u0440\u0430\u043d \xab\u0410\u043c\u0430\u0434\u0435\u0443\u0441\xbb \u043f\u0440\u0435\u0434\u043b\u0430\u0433\u0430\u0435\u0442 \u0437\u0440\u0438\u0442\u0435\u043b\u044f\u043c \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u043a\u043b\u0443\u0431\u043d\u044b\u0435 \u0432\u0441\u0442\u0440\u0435\u0447\u0438,  \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u044b, \u043e\u0431\u0449\u0435\u043d\u0438\u0435 \u0441 \u043c\u0430\u0441\u0442\u0435\u0440\u0430\u043c\u0438 \u0438\u0441\u043a\u0443\u0441\u0441\u0442\u0432, \u0430\u0440\u0442-\u043b\u0430\u043d\u0447\u0438. \u0418\u043c\u0435\u043d\u043d\u043e \u0437\u0434\u0435\u0441\u044c \u0412\u044b \u0441\u043c\u043e\u0436\u0435\u0442\u0435 \u0447\u0443\u0434\u0435\u0441\u043d\u043e \u043f\u0440\u043e\u0432\u0435\u0441\u0442\u0438 \u0432\u0440\u0435\u043c\u044f \u0432 \u043a\u0440\u0443\u0433\u0443 \u0434\u0440\u0443\u0437\u0435\u0439, \u0441\u043b\u0443\u0447\u0430\u0439\u043d\u043e \u0432\u0441\u0442\u0440\u0435\u0442\u0438\u0442\u044c\u0441\u044f \u0441 \u0438\u0437\u0432\u0435\u0441\u0442\u043d\u044b\u043c\u0438 \u0430\u043a\u0442\u0435\u0440\u0430\u043c\u0438, \u043c\u0443\u0437\u044b\u043a\u0430\u043d\u0442\u0430\u043c\u0438 \u0438 \u043f\u043e\u044d\u0442\u0430\u043c\u0438, \u0433\u0430\u0441\u0442\u0440\u043e\u043b\u0438\u0440\u0443\u044e\u0449\u0438\u043c\u0438 \u0432 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb, \u043f\u0440\u043e\u0432\u0435\u0441\u0442\u0438 \u0432\u0440\u0435\u043c\u044f, \u043e\u0431\u0449\u0430\u044f\u0441\u044c \u0441 \u0440\u0430\u0432\u043d\u044b\u043c\u0438 \u0441\u0435\u0431\u0435 \u043f\u043e\u0447\u0438\u0442\u0430\u0442\u0435\u043b\u044f\u043c\u0438 \u0432\u044b\u0441\u043e\u043a\u043e\u0433\u043e \u0438\u0441\u043a\u0443\u0441\u0441\u0442\u0432\u0430";
		this.__4.appendChild(this._description4);
		this._userdatabrd0.appendChild(this.__4);
		this.__5=document.createElement('div');
		this.__5.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 5'
		this.__5.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__5.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__5.setAttribute('style',hs);
		this.__5__img=document.createElement('img');
		this.__5__img.setAttribute('src','images/_5.jpg');
		this.__5__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__5__img);
		this.__5.appendChild(this.__5__img);
		this._description5=document.createElement('div');
		this._description5.ggId='description5'
		this._description5.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description5.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description5.setAttribute('style',hs);
		this._description5.innerHTML="\u0417\u0430\u043b \u0441\u043e\u0432\u0435\u0449\u0430\u043d\u0438\u0439 \u0438 \u043a\u043e\u043d\u0444\u0435\u0440\u0435\u043d\u0446\u0438\u0439 \xabRoyal\xbb \u0438\u043c\u0435\u0435\u0442 \u0438\u0441\u0442\u043e\u0440\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435. \u0421\u043e\u0437\u0434\u0430\u043d\u043d\u044b\u0439 \u043a\u0430\u043a \u043f\u0440\u043e\u0441\u0442\u0440\u0430\u043d\u0441\u0442\u0432\u043e \u0434\u043b\u044f \u0433\u0430\u0441\u0442\u0440\u043e\u043b\u0435\u0439 \u043b\u0443\u0447\u0448\u0438\u0445 \u0440\u0435\u0441\u0442\u043e\u0440\u0430\u0446\u0438\u0439, \u043e\u043d \u0431\u044b\u043b \u0440\u0435\u043a\u043e\u043d\u0441\u0442\u0440\u0443\u0438\u0440\u043e\u0432\u0430\u043d \u0434\u043b\u044f \u0432\u0441\u0442\u0440\u0435\u0447\u0438 \u043f\u0435\u0440\u0432\u044b\u0445 \u043b\u0438\u0446 \u0432 \u0440\u0430\u043c\u043a\u0430\u0445 \u0441\u0430\u043c\u043c\u0438\u0442\u0430 \u0420\u043e\u0441\u0441\u0438\u044f \u0415\u0432\u0440\u043e\u043f\u0435\u0439\u0441\u043a\u0438\u0439 \u0421\u043e\u044e\u0437 \u0432 2008 \u0433\u043e\u0434\u0443.\n\u0418\u043c\u0435\u043d\u043d\u043e \u0437\u0434\u0435\u0441\u044c \u0432\u043f\u0435\u0440\u0432\u044b\u0435 \u0432 \u0438\u0441\u0442\u043e\u0440\u0438\u0438 \u0441\u0430\u043c\u043c\u0438\u0442\u043e\u0432 \u0420\u043e\u0441\u0441\u0438\u044f - \u0415\u0421 \u0432\u043e\u043f\u0440\u043e\u0441\u044b \u044d\u043d\u0435\u0440\u0433\u043e\u0431\u0435\u0437\u043e\u043f\u0430\u0441\u043d\u043e\u0441\u0442\u0438, \u043d\u0435\u0441\u0442\u0430\u0431\u0438\u043b\u044c\u043d\u043e\u0441\u0442\u0438 \u043c\u0438\u0440\u043e\u0432\u043e\u0439 \u0444\u0438\u043d\u0430\u043d\u0441\u043e\u0432\u043e\u0439 \u0441\u0438\u0441\u0442\u0435\u043c\u044b \u0438 \u043f\u0440\u043e\u0434\u043e\u0432\u043e\u043b\u044c\u0441\u0442\u0432\u0435\u043d\u043d\u044b\u0439 \u043a\u0440\u0438\u0437\u0438\u0441 \u0440\u0430\u0441\u0441\u043c\u0430\u0442\u0440\u0438\u0432\u0430\u043b\u0438\u0441\u044c \u0441\u043a\u0432\u043e\u0437\u044c \u043f\u0440\u0438\u0437\u043c\u0443 \u043e\u0431\u0449\u043d\u043e\u0441\u0442\u0438 \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u043e\u0432. \u041f\u0440\u0435\u0437\u0438\u0434\u0435\u043d\u0442 \u0420\u043e\u0441\u0441\u0438\u0438 \u0414\u043c\u0438\u0442\u0440\u0438\u0439 \u041c\u0435\u0434\u0432\u0435\u0434\u0435\u0432, \u0413\u0435\u043d\u0435\u0440\u0430\u043b\u044c\u043d\u044b\u0439 \u0441\u0435\u043a\u0440\u0435\u0442\u0430\u0440\u044c \u0421\u043e\u0432\u0435\u0442\u0430 \u0415\u0421 \u0425\u0430\u0432\u044c\u0435\u0440 \u0421\u043e\u043b\u0430\u043d\u0430, \u041f\u0440\u0435\u0434\u0441\u0435\u0434\u0430\u0442\u0435\u043b\u044c \u041a\u043e\u043c\u0438\u0441\u0441\u0438\u0438 \u0415\u0421 \u0416\u043e\u0437\u0435 \u041c\u0430\u043d\u0443\u044d\u043b\u044c \u0411\u0430\u0440\u0440\u043e\u0437\u0443 \u0438 \u043f\u0440\u0435\u043c\u044c\u0435\u0440-\u043c\u0438\u043d\u0438\u0441\u0442\u0440 \u0421\u043b\u043e\u0432\u0435\u043d\u0438\u0438 \u042f\u043d\u0435\u0437 \u042f\u043d\u0448\u0430 \u0432\u044b\u0441\u043e\u043a\u043e \u043e\u0446\u0435\u043d\u0438\u043b\u0438 \u0443\u0431\u0440\u0430\u043d\u0441\u0442\u0432\u043e \u0437\u0430\u043b\u0430 \u0438 \u0432\u0441\u0435\u0433\u043e \u041a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430.\n\u0421\u0435\u0433\u043e\u0434\u043d\u044f \u0437\u0430\u043b \xabRoyal\xbb  \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u043e\u0434\u043d\u0438\u043c \u0438\u0437 \u0446\u0435\u043d\u0442\u0440\u043e\u0432 \u0434\u0435\u043b\u043e\u0432\u043e\u0439 \u0436\u0438\u0437\u043d\u0438 \u0425\u0430\u043d\u0442\u044b-\u041c\u0430\u043d\u0441\u0438\u0439\u0441\u043a\u0430 \u0438 \u042e\u0433\u0440\u044b. \u0412 \u044d\u0442\u043e\u043c \u0437\u0430\u043b\u0435 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u043a\u043e\u043d\u0444\u0435\u0440\u0435\u043d\u0446\u0438\u0438 \u0438 \u0434\u0435\u043b\u043e\u0432\u044b\u0435 \u0432\u0441\u0442\u0440\u0435\u0447\u0438 \u0440\u0435\u0441\u043f\u0435\u043a\u0442\u0430\u0431\u0435\u043b\u044c\u043d\u043e\u0433\u043e \u0443\u0440\u043e\u0432\u043d\u044f.\n";
		this.__5.appendChild(this._description5);
		this._userdatabrd0.appendChild(this.__5);
		this.__6=document.createElement('div');
		this.__6.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 6'
		this.__6.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__6.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__6.setAttribute('style',hs);
		this.__6__img=document.createElement('img');
		this.__6__img.setAttribute('src','images/_6.jpg');
		this.__6__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__6__img);
		this.__6.appendChild(this.__6__img);
		this._description6=document.createElement('div');
		this._description6.ggId='description6'
		this._description6.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description6.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description6.setAttribute('style',hs);
		this._description6.innerHTML="\u0417\u0430\u043b-\u0441\u0442\u0443\u0434\u0438\u044f \xab\u0422\u0440\u0430\u043d\u0441\u0444\u043e\u0440\u043c\u0435\u0440\xbb \u0443\u0436\u0435 \u043c\u043d\u043e\u0433\u043e \u043b\u0435\u0442 \u0441\u0447\u0438\u0442\u0430\u0435\u0442\u0441\u044f \u043e\u0434\u043d\u0438\u043c \u0438\u0437 \u043b\u0443\u0447\u0448\u0438\u0445 \u0437\u0430\u043b\u043e\u0432 \u0434\u043b\u044f \u043c\u043e\u043d\u043e- \u0438 \u043a\u0430\u043c\u0435\u0440\u043d\u044b\u0445 \u0438 \u0441\u043f\u0435\u043a\u0442\u0430\u043a\u043b\u0435\u0439. \u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u044c \u0440\u0430\u0437\u043c\u0435\u0449\u0435\u043d\u0438\u044f \u0437\u0440\u0438\u0442\u0435\u043b\u0435\u0439 \u0441 \u043b\u044e\u0431\u043e\u0439 \u0441\u0442\u043e\u0440\u043e\u043d\u044b, \u043f\u0440\u044f\u043c\u043e\u0439 \u0438 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439 \u0441\u0432\u0435\u0442 \u043d\u0435 \u043e\u0433\u0440\u0430\u043d\u0438\u0447\u0438\u0432\u0430\u044e\u0442 \u0444\u0430\u043d\u0442\u0430\u0437\u0438\u044e \u0440\u0435\u0436\u0438\u0441\u0441\u0435\u0440\u0430. \u0417\u0434\u0435\u0441\u044c \u0438\u0433\u0440\u0430\u044e\u0442\u0441\u044f \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0435 \u0441\u043f\u0435\u043a\u0442\u0430\u043a\u043b\u0438 \u043f\u0440\u0438\u0435\u0437\u0436\u0430\u044e\u0449\u0438\u0445 \u0433\u0430\u0441\u0442\u0440\u043e\u043b\u044c\u043d\u044b\u0445 \u0442\u0440\u0443\u043f, \u0430 \u0442\u0430\u043a\u0436\u0435 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u0440\u0435\u043f\u0435\u0442\u0438\u0446\u0438\u0438 \u0438 \u0441\u043f\u0435\u043a\u0442\u0430\u043a\u043b\u0438 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0445 \u0441\u0442\u0443\u0434\u0438\u0439.";
		this.__6.appendChild(this._description6);
		this._userdatabrd0.appendChild(this.__6);
		this.__7=document.createElement('div');
		this.__7.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 7'
		this.__7.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__7.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__7.setAttribute('style',hs);
		this.__7__img=document.createElement('img');
		this.__7__img.setAttribute('src','images/_7.jpg');
		this.__7__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__7__img);
		this.__7.appendChild(this.__7__img);
		this._description7=document.createElement('div');
		this._description7.ggId='description7'
		this._description7.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description7.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description7.setAttribute('style',hs);
		this._description7.innerHTML="\u0412 \u041e\u0440\u0433\u0430\u043d\u043d\u043e\u043c \u0437\u0430\u043b\u0435 \u043d\u0430 210 \u043c\u0435\u0441\u0442 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u043a\u0430\u043c\u0435\u0440\u043d\u044b\u0435 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u044b.\n\u0418\u043c\u0435\u043d\u043d\u043e \u0437\u0434\u0435\u0441\u044c \u0437\u0432\u0443\u0447\u0438\u0442 \u043f\u0435\u0440\u0432\u044b\u0439 \u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u044b\u0439 \u0440\u043e\u044f\u043b\u044c, \u0438\u0437\u0433\u043e\u0442\u043e\u0432\u043b\u0435\u043d\u043d\u044b\u0439 \u0437\u043d\u0430\u043c\u0435\u043d\u0438\u0442\u044b\u043c \u0438\u0442\u0430\u043b\u044c\u044f\u043d\u0441\u043a\u0438\u043c   \u043c\u0430\u0441\u0442\u0435\u0440\u043e\u043c   \u041f\u0430\u043e\u043b\u043e   \u0424\u0430\u0446\u0438\u043e\u043b\u0438 \u0434\u043b\u044f   \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430. \u0417\u0430\u043b \u0442\u0430\u043a\u0436\u0435 \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d \u0441\u043f\u0435\u0446\u0438\u0430\u043b\u044c\u043d\u044b\u043c\u0438 \u043a\u0440\u0435\u0441\u043b\u0430\u043c\u0438, \u0447\u0442\u043e \u0434\u0435\u043b\u0430\u0435\u0442 \u0435\u0433\u043e \u0430\u043a\u0443\u0441\u0442\u0438\u043a\u0443 \u0441\u043e\u0432\u0435\u0440\u0448\u0435\u043d\u043d\u043e\u0439.\n\u0412\u0430\u0436\u043d\u043e\u0435 \u0441\u043e\u0431\u044b\u0442\u0438\u0435 \u0432 \u043a\u0443\u043b\u044c\u0442\u0443\u0440\u043d\u043e\u0439 \u0436\u0438\u0437\u043d\u0438 \u043e\u043a\u0440\u0443\u0433\u0430 \u2013 \u0438\u043d\u0430\u0443\u0433\u0443\u0440\u0430\u0446\u0438\u044f \u043e\u0440\u0433\u0430\u043d\u0430 \u042e\u0433\u0440\u044b \u2013 \u0441\u043e\u0441\u0442\u043e\u044f\u043b\u043e\u0441\u044c 29 \u0444\u0435\u0432\u0440\u0430\u043b\u044f 2008 \u0433\u043e\u0434\u0430 \u0432 \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u043c \u0446\u0435\u043d\u0442\u0440\u0435 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb. \u0421\u0442\u0440\u043e\u0438\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u0443 \u043e\u0440\u0433\u0430\u043d\u0430 \u043f\u0440\u0435\u0434\u0448\u0435\u0441\u0442\u0432\u043e\u0432\u0430\u043b\u0430 \u0441\u0435\u0440\u044c\u0435\u0437\u043d\u0430\u044f \u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u0438\u0442\u0435\u043b\u044c\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430. \u0411\u044b\u043b\u0430 \u043f\u0440\u043e\u0432\u0435\u0434\u0435\u043d\u0430 \u0440\u0435\u043a\u043e\u043d\u0441\u0442\u0440\u0443\u043a\u0446\u0438\u044f \u0441\u0446\u0435\u043d\u044b \u0438 \u0432\u043c\u043e\u043d\u0442\u0438\u0440\u043e\u0432\u0430\u043d\u0430 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u0430\u044f \u0441\u0438\u0441\u0442\u0435\u043c\u0430 \u043a\u043b\u0438\u043c\u0430\u0442-\u043a\u043e\u043d\u0442\u0440\u043e\u043b\u044f, \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0449\u0430\u044f \u043f\u043e\u0434\u0434\u0435\u0440\u0436\u0438\u0432\u0430\u0442\u044c \u0432 \u0437\u0430\u043b\u0435 \u043e\u043f\u0442\u0438\u043c\u0430\u043b\u044c\u043d\u044b\u0435 \u0434\u043b\u044f \u0438\u043d\u0441\u0442\u0440\u0443\u043c\u0435\u043d\u0442\u0430 \u043f\u0430\u0440\u0430\u043c\u0435\u0442\u0440\u044b \u0442\u0435\u043c\u043f\u0435\u0440\u0430\u0442\u0443\u0440\u044b \u0438 \u0432\u043b\u0430\u0436\u043d\u043e\u0441\u0442\u0438. \u0423\u043d\u0438\u043a\u0430\u043b\u044c\u043d\u044b\u0439 \u043f\u0440\u043e\u0435\u043a\u0442 \u043f\u043e \u0441\u043e\u0437\u0434\u0430\u043d\u0438\u044e \u0434\u0443\u0445\u043e\u0432\u043e\u0433\u043e \u043e\u0440\u0433\u0430\u043d\u0430 \u0434\u043b\u044f \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u0431\u044b\u043b \u0440\u0435\u0430\u043b\u0438\u0437\u043e\u0432\u0430\u043d \u043f\u043e\u0434 \u043f\u0430\u0442\u0440\u043e\u043d\u0430\u0442\u043e\u043c \u041f\u0440\u0430\u0432\u0438\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u0430 \u0410\u0432\u0442\u043e\u043d\u043e\u043c\u043d\u043e\u0433\u043e \u043e\u043a\u0440\u0443\u0433\u0430. \u041e\u0440\u0433\u0430\u043d\u043e\u0441\u0442\u0440\u043e\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0435 \u0434\u0435\u043b\u043e \u0434\u0438\u043d\u0430\u0441\u0442\u0438\u0438 \u041a\u043b\u0430\u0439\u0441, \u0432\u043e\u0442 \u0443\u0436\u0435 125 \u043b\u0435\u0442 \u0441\u043b\u0430\u0432\u044f\u0449\u0435\u0439\u0441\u044f \u0432\u044b\u0441\u043e\u043a\u0438\u043c \u043a\u0430\u0447\u0435\u0441\u0442\u0432\u043e\u043c \u0440\u0430\u0431\u043e\u0442, \u0433\u0430\u0440\u0430\u043d\u0442\u0438\u0440\u0443\u0435\u0442 \u043e\u0440\u0433\u0430\u043d\u0443 \u0434\u043e\u043b\u0433\u0443\u044e \u0438 \u0442\u0432\u043e\u0440\u0447\u0435\u0441\u043a\u0443\u044e \u0436\u0438\u0437\u043d\u044c.\n\u0422\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0435 \u043f\u0430\u0440\u0430\u043c\u0435\u0442\u0440\u044b \u043e\u0440\u0433\u0430\u043d\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb: \u043e\u0431\u0449\u0430\u044f \u0432\u044b\u0441\u043e\u0442\u0430 \u043e\u0440\u0433\u0430\u043d\u0430 - 8 \u043c\u0435\u0442\u0440\u043e\u0432, \u0432\u0435\u0441 - 10 \u0442\u043e\u043d\u043d; 34 \u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0430; 3 \u043c\u0430\u043d\u0443\u0430\u043b\u0430 \u0438 \u043f\u0435\u0434\u0430\u043b\u044c\u043d\u0430\u044f \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0430, \u0438\u0433\u0440\u043e\u0432\u0430\u044f \u0442\u0440\u0430\u043a\u0442\u0443\u0440\u0430 - \u043c\u0435\u0445\u0430\u043d\u0438\u0447\u0435\u0441\u043a\u0430\u044f; \u0440\u0435\u0433\u0438\u0441\u0442\u0440\u043e\u0432\u0430\u044f \u0442\u0440\u0430\u043a\u0442\u0443\u0440\u0430 - \u044d\u043b\u0435\u043a\u0442\u0440\u0438\u0447\u0435\u0441\u043a\u0430\u044f, \u0441\u043d\u0430\u0431\u0436\u0435\u043d\u0430 \u0437\u0430\u043f\u043e\u043c\u0438\u043d\u0430\u044e\u0449\u0435\u0439\u0441\u044f \u0441\u0438\u0441\u0442\u0435\u043c\u043e\u0439 \u043f\u0430\u043c\u044f\u0442\u0438 \u0432 4000 \u043a\u043e\u043c\u0431\u0438\u043d\u0430\u0446\u0438\u0439; \u043a\u043e\u043b\u0438\u0447\u0435\u0441\u0442\u0432\u043e \u043a\u043b\u0430\u0432\u0438\u0448 \u043d\u0430 \u043c\u0430\u043d\u0443\u0430\u043b\u0430\u0445 - 58 (5 \u043e\u043a\u0442\u0430\u0432), \u043d\u0430 \u043f\u0435\u0434\u0430\u043b\u044c\u043d\u043e\u0439 \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0435 - 30 (2,5 \u043e\u043a\u0442\u0430\u0432\u044b). \u041e\u0440\u0433\u0430\u043d \u0441\u043d\u0430\u0431\u0436\u0435\u043d \u0432\u0441\u0435\u043c\u0438 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u044b\u043c\u0438 \u043a\u043e\u043f\u0443\u043b\u044f\u0446\u0438\u044f\u043c\u0438 \u0438 \u0448\u0432\u0435\u043b\u043b\u0435\u0440\u043e\u043c.\n\u0423\u043d\u0438\u043a\u0430\u043b\u0435\u043d \u044d\u043b\u0435\u0433\u0430\u043d\u0442\u043d\u044b\u0439 \u0434\u0438\u0437\u0430\u0439\u043d \u043e\u0440\u0433\u0430\u043d\u0430: \u0435\u0433\u043e \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0430 \u043e\u0442\u0434\u0435\u043b\u0430\u043d\u0430 \u043a\u043e\u0441\u0442\u044c\u044e \u043c\u0430\u043c\u043e\u043d\u0442\u0430. \u041e\u043f\u044b\u0442\u043d\u044b\u0435 \u043a\u043e\u0441\u0442\u043e\u0440\u0435\u0437\u044b \u043e\u043a\u0440\u0443\u0436\u043d\u043e\u0433\u043e \u0426\u0435\u043d\u0442\u0440\u0430 \u0440\u0435\u043c\u0451\u0441\u0435\u043b \u0438 \u043d\u0430\u0440\u043e\u0434\u043d\u044b\u0445 \u043f\u0440\u043e\u043c\u044b\u0441\u043b\u043e\u0432 \u0432\u044b\u043f\u0438\u043b\u0438\u043b\u0438 \u0438\u0437 \u0431\u0438\u0432\u043d\u0435\u0439 \u043c\u0430\u043c\u043e\u043d\u0442\u0435\u043d\u043a\u0430, \u043f\u0440\u043e\u043b\u0435\u0436\u0430\u0432\u0448\u0435\u0433\u043e \u0432 \u0432\u0435\u0447\u043d\u043e\u0439 \u043c\u0435\u0440\u0437\u043b\u043e\u0442\u0435 \u043e\u043a\u043e\u043b\u043e 500 000 \u043b\u0435\u0442, \u0431\u043e\u043b\u0435\u0435 \u0441\u043e\u0442\u043d\u0438 \u0442\u043e\u043d\u0447\u0430\u0439\u0448\u0438\u0445 \u043f\u043b\u0430\u0441\u0442\u0438\u043d \u0434\u043b\u044f \u043a\u043b\u0430\u0432\u0438\u0448.\n\u041f\u043e\u0447\u0435\u0442\u043d\u043e\u0435 \u043f\u0440\u0430\u0432\u043e \u043e\u0442\u043a\u0440\u044b\u0442\u044c \u043e\u0440\u0433\u0430\u043d \u042e\u0433\u0440\u044b \u0431\u044b\u043b \u0443\u0434\u043e\u0441\u0442\u043e\u0435\u043d \u043f\u0440\u043e\u0444\u0435\u0441\u0441\u043e\u0440 \u041a\u0451\u043b\u044c\u043d\u0441\u043a\u043e\u0433\u043e \u0443\u043d\u0438\u0432\u0435\u0440\u0441\u0438\u0442\u0435\u0442\u0430, \u0433\u043b\u0430\u0432\u043d\u044b\u0439 \u043e\u0440\u0433\u0430\u043d\u0438\u0441\u0442 \u041a\u0435\u043b\u044c\u043d\u0441\u043a\u043e\u0433\u043e \u043a\u0430\u0444\u0435\u0434\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0441\u043e\u0431\u043e\u0440\u0430 \u0412\u0438\u043d\u0444\u0440\u0438\u0434 \u0411\u0451\u043d\u0438\u0433. \u041f\u043e \u043e\u043a\u043e\u043d\u0447\u0430\u043d\u0438\u0438 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u0430 \u0412\u0438\u043d\u0444\u0440\u0438\u0434 \u0411\u0451\u043d\u0438\u0433 \u0432\u043e\u0441\u043a\u043b\u0438\u043a\u043d\u0443\u043b: \xab\u041e\u0440\u0433\u0430\u043d \u0432\u0435\u043b\u0438\u043a\u043e\u043b\u0435\u043f\u043d\u044b\u0439! \u041e\u0434\u0438\u043d \u0438\u0437 \u043b\u0443\u0447\u0448\u0438\u0445 \u043a\u0430\u043c\u0435\u0440\u043d\u044b\u0445 \u043e\u0440\u0433\u0430\u043d\u043e\u0432 \u0415\u0432\u0440\u043e\u043f\u044b!\xbb\n";
		this.__7.appendChild(this._description7);
		this._userdatabrd0.appendChild(this.__7);
		this.__8=document.createElement('div');
		this.__8.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 8'
		this.__8.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__8.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__8.setAttribute('style',hs);
		this.__8__img=document.createElement('img');
		this.__8__img.setAttribute('src','images/_8.jpg');
		this.__8__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__8__img);
		this.__8.appendChild(this.__8__img);
		this._description8=document.createElement('div');
		this._description8.ggId='description8'
		this._description8.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description8.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description8.setAttribute('style',hs);
		this._description8.innerHTML="\u041f\u0440\u0435\u0441\u0441-\u0437\u0430\u043b. \u0417\u0434\u0435\u0441\u044c    \u043f\u0440\u043e\u0432\u043e\u0434\u044f\u0442\u0441\u044f    \u043f\u0440\u0435\u0441\u0441-\u043a\u043e\u043d\u0444\u0435\u0440\u0435\u043d\u0446\u0438\u0438,    \u0432\u0441\u0442\u0440\u0435\u0447\u0438    \u0441 \u0436\u0443\u0440\u043d\u0430\u043b\u0438\u0441\u0442\u0430\u043c\u0438, \u0431\u0440\u0438\u0444\u0438\u043d\u0433\u0438. \u041f\u0440\u0435\u0441\u0441-\u0437\u0430\u043b \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0434\u043e\u043c\u043e\u043c \u0434\u043b\u044f \u043f\u043e\u0447\u0438\u0442\u0430\u0442\u0435\u043b\u0435\u0439 \u043a\u043b\u0443\u0431\u043d\u043e\u0433\u043e \u0441\u0442\u0438\u043b\u044f \u0436\u0438\u0437\u043d\u0438. \u0417\u0430\u043b \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d \u0441\u0438\u0441\u0442\u0435\u043c\u043e\u0439, \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0449\u0435\u0439 \u043e\u0440\u0433\u0430\u043d\u0438\u0437\u043e\u0432\u0430\u0442\u044c \u0441\u0438\u043d\u0445\u0440\u043e\u043d\u043d\u044b\u0439 \u043f\u0435\u0440\u0435\u0432\u043e\u0434. \u0412 \u0440\u0430\u043c\u043a\u0430\u0445 \u043c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u044b\u0445 \u0444\u0435\u0441\u0442\u0438\u0432\u0430\u043b\u0435\u0439 \u0432 \u0437\u0430\u043b\u0435 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u0441\u043f\u0435\u0446\u0438\u0430\u043b\u044c\u043d\u044b\u0435 \u043f\u043e\u043a\u0430\u0437\u044b \u0434\u043b\u044f \u043f\u0440\u0435\u0441\u0441\u044b. \u041f\u0440\u0435\u0441\u0441-\u0437\u0430\u043b \u0441\u0442\u0430\u043b \u043b\u044e\u0431\u0438\u043c\u044b\u043c \u043c\u0435\u0441\u0442\u043e\u043c \u044e\u0433\u043e\u0440\u0441\u043a\u0438\u0445 \u043a\u0438\u043d\u043e\u043c\u0430\u043d\u043e\u0432.  \u041a\u043b\u0443\u0431 \u043b\u044e\u0431\u0438\u0442\u0435\u043b\u0435\u0439 \u043e\u043f\u0435\u0440\u044b \u0438 \u0431\u0430\u043b\u0435\u0442\u0430, \u043a\u043b\u0443\u0431 \xab\u0411\u0435\u0441\u0435\u0434\u044b \u043e \u0432\u0435\u043b\u0438\u043a\u043e\u0439 \u043c\u0443\u0437\u044b\u043a\u0435 \u0438 \u0435\u0435 \u0441\u043e\u0437\u0434\u0430\u0442\u0435\u043b\u044f\u0445\xbb \u043d\u0430\u0448\u043b\u0438 \u0441\u0435\u0431\u044f \u0432 \u044d\u0442\u0438\u0445 \u0441\u0442\u0435\u043d\u0430\u0445. \u041a\u043e\u043c\u0444\u043e\u0440\u0442\u043d\u044b\u0435 \u043a\u0440\u0435\u0441\u043b\u0430 \u0438 \u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u043e\u0441\u043d\u0430\u0449\u0435\u043d\u0438\u0435 \u0441\u043e\u0437\u0434\u0430\u044e\u0442 \u0432\u0441\u0435 \u0443\u0441\u043b\u043e\u0432\u0438\u044f \u0434\u043b\u044f \u043e\u0431\u0449\u0435\u043d\u0438\u044f \u0438 \u043f\u0440\u043e\u0441\u0432\u0435\u0449\u0435\u043d\u0438\u044f. \u041e\u0431\u0449\u0430\u044f \u043f\u043b\u043e\u0449\u0430\u0434\u044c \u0437\u0430\u043b\u0430 135 \u043a\u0432.\u043c., \u0432\u043c\u0435\u0441\u0442\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0441\u0442\u044c 54 \u043c\u0435\u0441\u0442\u0430, \u0440\u0430\u0437\u043c\u0435\u0440 \u044d\u043a\u0440\u0430\u043d\u0430: \u0434\u043b\u0438\u043d\u0430 5 \u043c, \u0432\u044b\u0441\u043e\u0442\u0430 2\u043c.";
		this.__8.appendChild(this._description8);
		this._userdatabrd0.appendChild(this.__8);
		this.__9=document.createElement('div');
		this.__9.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 9'
		this.__9.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__9.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__9.setAttribute('style',hs);
		this.__9__img=document.createElement('img');
		this.__9__img.setAttribute('src','images/_9.jpg');
		this.__9__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__9__img);
		this.__9.appendChild(this.__9__img);
		this._description9=document.createElement('div');
		this._description9.ggId='description9'
		this._description9.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description9.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description9.setAttribute('style',hs);
		this._description9.innerHTML="\u041f\u0430\u0440\u0430\u0434\u043d\u043e\u0435 \u0444\u043e\u0439\u0435 \xab\u0421\u0432\u0435\u0442 \u041e\u043d\u0438\u043a\u0441\u0430\xbb \u043f\u043e\u043b\u0443\u0447\u0438\u043b\u043e \u0441\u0432\u043e\u0435 \u043d\u0430\u0437\u0432\u0430\u043d\u0438\u0435 \u0431\u043b\u0430\u0433\u043e\u0434\u0430\u0440\u044f \u0443\u043d\u0438\u043a\u0430\u043b\u044c\u043d\u043e\u043c\u0443 \u0438\u043d\u0442\u0435\u0440\u044c\u0435\u0440\u0443: \u0446\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u043a\u043e\u043b\u043e\u043d\u043d\u0430 \u0438 \u0441\u0442\u0435\u043d\u0430 \u0443\u043a\u0440\u0430\u0448\u0435\u043d\u044b \u043f\u043b\u0430\u0441\u0442\u0438\u043d\u0430\u043c\u0438 \u043d\u0430\u0442\u0443\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u043a\u0430\u043c\u043d\u044f \u043e\u043d\u0438\u043a\u0441\u0430.\n\u0415\u0449\u0435 \u043e\u0434\u043d\u0438\u043c \u0443\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u0435\u043c \u0444\u043e\u0439\u0435 \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0432\u0438\u043d\u0442\u043e\u0432\u0430\u044f \u043b\u0435\u0441\u0442\u043d\u0438\u0446\u0430, \u0432\u0435\u0434\u0443\u0449\u0430\u044f \u043d\u0430 2-\u0439 \u044d\u0442\u0430\u0436 \u043a \u0411\u043e\u043b\u044c\u0448\u043e\u043c\u0443 \u0437\u0430\u043b\u0443 \u0438 \u043d\u0430 3-\u0439 \u044d\u0442\u0430\u0436 \u043a \u0437\u0430\u043b\u0443-\u0441\u0442\u0443\u0434\u0438\u0438 \xab\u0422\u0440\u0430\u043d\u0441\u0444\u043e\u0440\u043c\u0435\u0440\xbb. \u041d\u0435\u0441\u043c\u043e\u0442\u0440\u044f \u043d\u0430 \u0441\u0432\u043e\u0439 \u0432\u0435\u0441 \u0438 \u0432\u044b\u0441\u043e\u0442\u0443, \u043b\u0435\u0441\u0442\u043d\u0438\u0446\u0430 \u0432\u0437\u043c\u044b\u0432\u0430\u0435\u0442 \u0432\u0432\u0435\u0440\u0445 \u0431\u0435\u0437 \u0434\u043e\u043f\u043e\u043b\u043d\u0438\u0442\u0435\u043b\u044c\u043d\u044b\u0445 \u043e\u043f\u043e\u0440 \u0438 \u043a\u043e\u043b\u043e\u043d, \u0441\u0430\u043c\u0430 \u043f\u043e\u0434\u0434\u0435\u0440\u0436\u0438\u0432\u0430\u044f \u0441\u0435\u0431\u044f.\n\u041f\u0440\u043e\u0441\u0442\u043e\u0440\u043d\u043e\u0435 \u0444\u043e\u0439\u0435 \u0433\u0430\u0440\u043c\u043e\u043d\u0438\u0447\u043d\u043e \u0441\u043e\u0447\u0435\u0442\u0430\u0435\u0442 \u0432 \u0441\u0435\u0431\u0435 \u0442\u0435\u043f\u043b\u044b\u0435 \u0441\u0432\u0435\u0442\u043b\u043e-\u043a\u043e\u0444\u0435\u0439\u043d\u044b\u0435 \u0442\u043e\u043d\u0430 \u0438 \u043c\u044f\u0433\u043a\u0443\u044e \u0437\u043e\u043b\u043e\u0442\u0443\u044e \u043f\u043e\u0434\u0441\u0432\u0435\u0442\u043a\u0443. \u041f\u0435\u0440\u0435\u0434 \u043d\u0430\u0447\u0430\u043b\u043e\u043c \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043e\u0432 \u0432 \u0444\u043e\u0439\u0435 \u0438 \u0430\u0440\u0442-\u0441\u0430\u043b\u043e\u043d\u0435 \u0437\u0432\u0443\u0447\u0438\u0442 \u043a\u043b\u0430\u0441\u0441\u0438\u0447\u0435\u0441\u043a\u0430\u044f \u043c\u0443\u0437\u044b\u043a\u0430 \u0432 \u0444\u043e\u0440\u0442\u0435\u043f\u0438\u0430\u043d\u043d\u043e\u043c \u0438\u0441\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u0438.\n";
		this.__9.appendChild(this._description9);
		this._userdatabrd0.appendChild(this.__9);
		this.__10=document.createElement('div');
		this.__10.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 10'
		this.__10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__10.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__10.setAttribute('style',hs);
		this.__10__img=document.createElement('img');
		this.__10__img.setAttribute('src','images/_10.jpg');
		this.__10__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__10__img);
		this.__10.appendChild(this.__10__img);
		this._description10=document.createElement('div');
		this._description10.ggId='description10'
		this._description10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description10.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description10.setAttribute('style',hs);
		this._description10.innerHTML="\u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439 \u0446\u0435\u043d\u0442\u0440 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb  \u043e\u0442\u043a\u0440\u044b\u0442 \u0432 \u0414\u0435\u043d\u044c \u0430\u0432\u0442\u043e\u043d\u043e\u043c\u043d\u043e\u0433\u043e \u043e\u043a\u0440\u0443\u0433\u0430 \u2013 10 \u0434\u0435\u043a\u0430\u0431\u0440\u044f 2004 \u0433\u043e\u0434\u0430. \u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u0438 \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0442 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u044f\u0442\u044c \u043a\u0443\u043b\u044c\u0442\u0443\u0440\u043d\u044b\u0435 \u043f\u0440\u043e\u0435\u043a\u0442\u044b \u043a\u0430\u043a \u0440\u043e\u0441\u0441\u0438\u0439\u0441\u043a\u043e\u0433\u043e, \u0442\u0430\u043a \u0438 \u043c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u0433\u043e \u043c\u0430\u0441\u0448\u0442\u0430\u0431\u0430. \u041e\u0431\u0449\u0430\u044f \u043f\u043b\u043e\u0449\u0430\u0434\u044c \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 (18 \u0442\u044b\u0441. \u043a\u0432. \u043c\u0435\u0442\u0440\u043e\u0432) \u0432\u043a\u043b\u044e\u0447\u0430\u0435\u0442 4 \u0437\u0430\u043b\u0430, \u0430\u0440\u0442-\u0441\u0430\u043b\u043e\u043d, \u043a\u043b\u0443\u0431-\u0440\u0435\u0441\u0442\u043e\u0440\u0430\u043d \xab\u0410\u043c\u0430\u0434\u0435\u0443\u0441\xbb, \u0437\u0430\u043b \xabRoyal\xbb,  \u0433\u043e\u0441\u0442\u0438\u043d\u0438\u0446\u0443 \u043d\u0430 30 \u043c\u0435\u0441\u0442, \u0437\u0438\u043c\u043d\u044e\u044e \u043f\u0430\u0440\u043a\u043e\u0432\u043a\u0443 \u043d\u0430 70 \u043c\u0435\u0441\u0442 \u0438 \u043e\u0444\u0438\u0441\u043d\u044b\u0435 \u043f\u043e\u043c\u0435\u0449\u0435\u043d\u0438\u044f.\n\u0410\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u0443\u0440\u043d\u044b\u0439 \u043f\u0440\u043e\u0435\u043a\u0442 \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb (\u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440 \u0421\u0432\u0435\u0442\u043b\u0430\u043d\u0430 \u041f\u0435\u0439\u0434\u0430) \u0431\u044b\u043b \u043e\u0442\u043c\u0435\u0447\u0435\u043d \u0437\u043e\u043b\u043e\u0442\u044b\u043c \u0434\u0438\u043f\u043b\u043e\u043c\u043e\u043c \u0444\u0435\u0441\u0442\u0438\u0432\u0430\u043b\u044f \xab\u0417\u043e\u0434\u0447\u0435\u0441\u0442\u0432\u043e\xbb (\u0433.\u041c\u043e\u0441\u043a\u0432\u0430) \u0438 \u0441\u0435\u0440\u0435\u0431\u0440\u044f\u043d\u043e\u0439 \u043c\u0435\u0434\u0430\u043b\u044c\u044e \u043d\u0430 \u041c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u043c \u043a\u043e\u043d\u043a\u0443\u0440\u0441\u0435 \u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440\u043e\u0432 \u0432 \u0411\u043e\u043b\u0433\u0430\u0440\u0438\u0438\n";
		this.__10.appendChild(this._description10);
		this._userdatabrd0.appendChild(this.__10);
		this.__11=document.createElement('div');
		this.__11.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 11'
		this.__11.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__11.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__11.setAttribute('style',hs);
		this.__11__img=document.createElement('img');
		this.__11__img.setAttribute('src','images/_11.jpg');
		this.__11__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__11__img);
		this.__11.appendChild(this.__11__img);
		this._description11=document.createElement('div');
		this._description11.ggId='description11'
		this._description11.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description11.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description11.setAttribute('style',hs);
		this._description11.innerHTML="\u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439 \u0446\u0435\u043d\u0442\u0440 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb  \u043e\u0442\u043a\u0440\u044b\u0442 \u0432 \u0414\u0435\u043d\u044c \u0430\u0432\u0442\u043e\u043d\u043e\u043c\u043d\u043e\u0433\u043e \u043e\u043a\u0440\u0443\u0433\u0430 \u2013 10 \u0434\u0435\u043a\u0430\u0431\u0440\u044f 2004 \u0433\u043e\u0434\u0430. \u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u0438 \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0442 \u043e\u0441\u0443\u0449\u0435\u0441\u0442\u0432\u043b\u044f\u0442\u044c \u043a\u0443\u043b\u044c\u0442\u0443\u0440\u043d\u044b\u0435 \u043f\u0440\u043e\u0435\u043a\u0442\u044b \u043a\u0430\u043a \u0440\u043e\u0441\u0441\u0438\u0439\u0441\u043a\u043e\u0433\u043e, \u0442\u0430\u043a \u0438 \u043c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u0433\u043e \u043c\u0430\u0441\u0448\u0442\u0430\u0431\u0430. \u041e\u0431\u0449\u0430\u044f \u043f\u043b\u043e\u0449\u0430\u0434\u044c \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0441\u0430 (18 \u0442\u044b\u0441. \u043a\u0432. \u043c\u0435\u0442\u0440\u043e\u0432) \u0432\u043a\u043b\u044e\u0447\u0430\u0435\u0442 4 \u0437\u0430\u043b\u0430, \u0430\u0440\u0442-\u0441\u0430\u043b\u043e\u043d, \u043a\u043b\u0443\u0431-\u0440\u0435\u0441\u0442\u043e\u0440\u0430\u043d \xab\u0410\u043c\u0430\u0434\u0435\u0443\u0441\xbb, \u0437\u0430\u043b \xabRoyal\xbb,  \u0433\u043e\u0441\u0442\u0438\u043d\u0438\u0446\u0443 \u043d\u0430 30 \u043c\u0435\u0441\u0442, \u0437\u0438\u043c\u043d\u044e\u044e \u043f\u0430\u0440\u043a\u043e\u0432\u043a\u0443 \u043d\u0430 70 \u043c\u0435\u0441\u0442 \u0438 \u043e\u0444\u0438\u0441\u043d\u044b\u0435 \u043f\u043e\u043c\u0435\u0449\u0435\u043d\u0438\u044f.\n\u0410\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u0443\u0440\u043d\u044b\u0439 \u043f\u0440\u043e\u0435\u043a\u0442 \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb (\u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440 \u0421\u0432\u0435\u0442\u043b\u0430\u043d\u0430 \u041f\u0435\u0439\u0434\u0430) \u0431\u044b\u043b \u043e\u0442\u043c\u0435\u0447\u0435\u043d \u0437\u043e\u043b\u043e\u0442\u044b\u043c \u0434\u0438\u043f\u043b\u043e\u043c\u043e\u043c \u0444\u0435\u0441\u0442\u0438\u0432\u0430\u043b\u044f \xab\u0417\u043e\u0434\u0447\u0435\u0441\u0442\u0432\u043e\xbb (\u0433.\u041c\u043e\u0441\u043a\u0432\u0430) \u0438 \u0441\u0435\u0440\u0435\u0431\u0440\u044f\u043d\u043e\u0439 \u043c\u0435\u0434\u0430\u043b\u044c\u044e \u043d\u0430 \u041c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u043c \u043a\u043e\u043d\u043a\u0443\u0440\u0441\u0435 \u0430\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u043e\u0440\u043e\u0432 \u0432 \u0411\u043e\u043b\u0433\u0430\u0440\u0438\u0438\n";
		this.__11.appendChild(this._description11);
		this._userdatabrd0.appendChild(this.__11);
		this.__12=document.createElement('div');
		this.__12.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 12'
		this.__12.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__12.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 600px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__12.setAttribute('style',hs);
		this.__12__img=document.createElement('img');
		this.__12__img.setAttribute('src','images/_12.jpg');
		this.__12__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__12__img);
		this.__12.appendChild(this.__12__img);
		this._description12=document.createElement('div');
		this._description12.ggId='description12'
		this._description12.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description12.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 601px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description12.setAttribute('style',hs);
		this._description12.innerHTML="\u041f\u0430\u0440\u0430\u0434\u043d\u043e\u0435 \u0444\u043e\u0439\u0435 \xab\u0421\u0432\u0435\u0442 \u041e\u043d\u0438\u043a\u0441\u0430\xbb \u043f\u043e\u043b\u0443\u0447\u0438\u043b\u043e \u0441\u0432\u043e\u0435 \u043d\u0430\u0437\u0432\u0430\u043d\u0438\u0435 \u0431\u043b\u0430\u0433\u043e\u0434\u0430\u0440\u044f \u0443\u043d\u0438\u043a\u0430\u043b\u044c\u043d\u043e\u043c\u0443 \u0438\u043d\u0442\u0435\u0440\u044c\u0435\u0440\u0443: \u0446\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u0430\u044f \u043a\u043e\u043b\u043e\u043d\u043d\u0430 \u0438 \u0441\u0442\u0435\u043d\u0430 \u0443\u043a\u0440\u0430\u0448\u0435\u043d\u044b \u043f\u043b\u0430\u0441\u0442\u0438\u043d\u0430\u043c\u0438 \u043d\u0430\u0442\u0443\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u043a\u0430\u043c\u043d\u044f \u043e\u043d\u0438\u043a\u0441\u0430.\n\u0415\u0449\u0435 \u043e\u0434\u043d\u0438\u043c \u0443\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u0435\u043c \u0444\u043e\u0439\u0435 \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0432\u0438\u043d\u0442\u043e\u0432\u0430\u044f \u043b\u0435\u0441\u0442\u043d\u0438\u0446\u0430, \u0432\u0435\u0434\u0443\u0449\u0430\u044f \u043d\u0430 2-\u0439 \u044d\u0442\u0430\u0436 \u043a \u0411\u043e\u043b\u044c\u0448\u043e\u043c\u0443 \u0437\u0430\u043b\u0443 \u0438 \u043d\u0430 3-\u0439 \u044d\u0442\u0430\u0436 \u043a \u0437\u0430\u043b\u0443-\u0441\u0442\u0443\u0434\u0438\u0438 \xab\u0422\u0440\u0430\u043d\u0441\u0444\u043e\u0440\u043c\u0435\u0440\xbb. \u041d\u0435\u0441\u043c\u043e\u0442\u0440\u044f \u043d\u0430 \u0441\u0432\u043e\u0439 \u0432\u0435\u0441 \u0438 \u0432\u044b\u0441\u043e\u0442\u0443, \u043b\u0435\u0441\u0442\u043d\u0438\u0446\u0430 \u0432\u0437\u043c\u044b\u0432\u0430\u0435\u0442 \u0432\u0432\u0435\u0440\u0445 \u0431\u0435\u0437 \u0434\u043e\u043f\u043e\u043b\u043d\u0438\u0442\u0435\u043b\u044c\u043d\u044b\u0445 \u043e\u043f\u043e\u0440 \u0438 \u043a\u043e\u043b\u043e\u043d, \u0441\u0430\u043c\u0430 \u043f\u043e\u0434\u0434\u0435\u0440\u0436\u0438\u0432\u0430\u044f \u0441\u0435\u0431\u044f.\n\u041f\u0440\u043e\u0441\u0442\u043e\u0440\u043d\u043e\u0435 \u0444\u043e\u0439\u0435 \u0433\u0430\u0440\u043c\u043e\u043d\u0438\u0447\u043d\u043e \u0441\u043e\u0447\u0435\u0442\u0430\u0435\u0442 \u0432 \u0441\u0435\u0431\u0435 \u0442\u0435\u043f\u043b\u044b\u0435 \u0441\u0432\u0435\u0442\u043b\u043e-\u043a\u043e\u0444\u0435\u0439\u043d\u044b\u0435 \u0442\u043e\u043d\u0430 \u0438 \u043c\u044f\u0433\u043a\u0443\u044e \u0437\u043e\u043b\u043e\u0442\u0443\u044e \u043f\u043e\u0434\u0441\u0432\u0435\u0442\u043a\u0443. \u041f\u0435\u0440\u0435\u0434 \u043d\u0430\u0447\u0430\u043b\u043e\u043c \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043e\u0432 \u0432 \u0444\u043e\u0439\u0435 \u0438 \u0430\u0440\u0442-\u0441\u0430\u043b\u043e\u043d\u0435 \u0437\u0432\u0443\u0447\u0438\u0442 \u043a\u043b\u0430\u0441\u0441\u0438\u0447\u0435\u0441\u043a\u0430\u044f \u043c\u0443\u0437\u044b\u043a\u0430 \u0432 \u0444\u043e\u0440\u0442\u0435\u043f\u0438\u0430\u043d\u043d\u043e\u043c \u0438\u0441\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u0438.\n";
		this.__12.appendChild(this._description12);
		this._userdatabrd0.appendChild(this.__12);
		this._kabinet.appendChild(this._userdatabrd0);
		this.divSkin.appendChild(this._kabinet);
		this._kabinet1=document.createElement('div');
		this._kabinet1.ggId='kabinet1'
		this._kabinet1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._kabinet1.ggVisible=false;
		this._kabinet1.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-360 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-371 + h/2) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -360px;';
		hs+='top:  -371px;';
		hs+='width: 819px;';
		hs+='height: 650px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this._kabinet1.setAttribute('style',hs);
		this._userdatabg=document.createElement('div');
		this._userdatabg.ggId='userdatabg'
		this._userdatabg.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._userdatabg.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  7px;';
		hs+='width: 814px;';
		hs+='height: 639px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		hs+='background-color: #000000;';
		this._userdatabg.setAttribute('style',hs);
		this._kabinet1.appendChild(this._userdatabg);
		this._userdatabrd=document.createElement('div');
		this._userdatabrd.ggId='userdatabrd'
		this._userdatabrd.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._userdatabrd.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -1px;';
		hs+='top:  7px;';
		hs+='width: 813px;';
		hs+='height: 637px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 2px solid #ffffff;';
		hs+='border-radius: 10px;';
		hs+='-webkit-border-radius: 10px;';
		hs+='-moz-border-radius: 10px;';
		this._userdatabrd.setAttribute('style',hs);
		this.__311=document.createElement('div');
		this.__311.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 311'
		this.__311.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__311.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 800px;';
		hs+='height: 400px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__311.setAttribute('style',hs);
		this.__311__img=document.createElement('img');
		this.__311__img.setAttribute('src','images/_311.jpg');
		this.__311__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__311__img);
		this.__311.appendChild(this.__311__img);
		this._description311=document.createElement('div');
		this._description311.ggId='description311'
		this._description311.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description311.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -2px;';
		hs+='top:  402px;';
		hs+='width: 801px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description311.setAttribute('style',hs);
		this._description311.innerHTML="\u0411\u043e\u043b\u044c\u0448\u043e\u0439 \u0437\u0430\u043b \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u0440\u0430\u0441\u0441\u0447\u0438\u0442\u0430\u043d \u043d\u0430 1000 \u043c\u0435\u0441\u0442. \u0410\u043a\u0443\u0441\u0442\u0438\u0447\u0435\u0441\u043a\u0438\u0435 \u0437\u0440\u0438\u0442\u0435\u043b\u044c\u0441\u043a\u0438\u0435 \u043a\u0440\u0435\u0441\u043b\u0430 \u0438\u0437\u0433\u043e\u0442\u043e\u0432\u043b\u0435\u043d\u044b \u0432 \u0418\u0442\u0430\u043b\u0438\u0438. \u0420\u0430\u0431\u043e\u0447\u0430\u044f \u0433\u043b\u0443\u0431\u0438\u043d\u0430 \u0441\u0446\u0435\u043d\u044b 18,5 \u043c, \u0448\u0438\u0440\u0438\u043d\u0430 18 \u043c, \u0434\u0438\u0430\u043c\u0435\u0442\u0440 \u043f\u043e\u0432\u043e\u0440\u043e\u0442\u043d\u043e\u0433\u043e \u043a\u0440\u0443\u0433\u0430 11 \u043c, \u0437\u0435\u0440\u043a\u0430\u043b\u043e \u0441\u0446\u0435\u043d\u044b 7,6 \u043c \u043d\u0430 18 \u043c. \u041a\u043e\u043d\u0441\u0442\u0440\u0443\u043a\u0446\u0438\u044f \u0437\u0430\u043b\u0430 \u0438 \u0435\u0433\u043e \u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u043e\u0441\u043d\u0430\u0449\u0435\u043d\u0438\u0435 \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0442 \u043f\u043e\u0434\u043d\u0438\u043c\u0430\u0442\u044c \u043f\u0430\u0440\u0442\u0435\u0440 \u0434\u043e \u0443\u0440\u043e\u0432\u043d\u044f \u0441\u0446\u0435\u043d\u044b \u0438 \u043f\u0435\u0440\u0432\u043e\u0433\u043e \u0440\u044f\u0434\u0430 \u0430\u043c\u0444\u0438\u0442\u0435\u0430\u0442\u0440\u0430. \u0422\u0430\u043a\u0438\u043c \u043e\u0431\u0440\u0430\u0437\u043e\u043c, \u0441\u0446\u0435\u043d\u0430 \u0443\u0432\u0435\u043b\u0438\u0447\u0438\u0432\u0430\u0435\u0442\u0441\u044f \u0432 \u0433\u043b\u0443\u0431\u0438\u043d\u0443 \u043f\u043e\u0447\u0442\u0438 \u043d\u0430 10,5 \u043c. 16 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043c\u0435\u0445\u0430\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0445 \u0438 19 \u0440\u0443\u0447\u043d\u044b\u0445 \u0448\u0442\u0430\u043d\u043a\u0435\u0442\u043e\u0432, \u0441\u043e\u0432\u0440\u0435\u043c\u0435\u043d\u043d\u043e\u0435 \u0441\u0432\u0435\u0442\u043e\u0432\u043e\u0435 \u0438 \u0437\u0432\u0443\u043a\u043e\u0432\u043e\u0435 \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d\u0438\u0435 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0438\u0432\u0430\u044e\u0442 \u0432\u044b\u0441\u043e\u043a\u0438\u0439 \u0443\u0440\u043e\u0432\u0435\u043d\u044c \u043f\u0440\u043e\u0432\u043e\u0434\u0438\u043c\u044b\u0445 \u043c\u0435\u0440\u043e\u043f\u0440\u0438\u044f\u0442\u0438\u0439. \u0417\u0430\u043b \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d \u043f\u0440\u043e\u0444\u0435\u0441\u0441\u0438\u043e\u043d\u0430\u043b\u044c\u043d\u044b\u043c \u043a\u0438\u043d\u043e\u043f\u0440\u043e\u0435\u043a\u0442\u043e\u0440\u043e\u043c  HERNON 15 Digital Audio, \u0437\u0432\u0443\u043a\u043e\u043c \u0441\u0438\u0441\u0442\u0435\u043c\u044b Dolby, 4-\u043c\u044f \u0440\u0430\u0437\u043d\u043e\u0444\u043e\u0440\u043c\u0430\u0442\u043d\u044b\u043c\u0438 \u044d\u043a\u0440\u0430\u043d\u0430\u043c\u0438, \u0432 \u0442\u043e\u043c \u0447\u0438\u0441\u043b\u0435 \u0441\u0438\u0441\u0442\u0435\u043c\u043e\u0439, \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0449\u0435\u0439 \u0432\u043e\u0441\u043f\u0440\u043e\u0438\u0437\u0432\u043e\u0434\u0438\u0442\u044c \u0444\u0438\u043b\u044c\u043c\u044b \u0432 \u0444\u043e\u0440\u043c\u0430\u0442\u0435 3D. \u041a \u0443\u0441\u043b\u0443\u0433\u0430\u043c \u0430\u0440\u0442\u0438\u0441\u0442\u043e\u0432 16 \u043f\u0440\u043e\u0441\u0442\u043e\u0440\u043d\u044b\u0445 \u043a\u043e\u043c\u0444\u043e\u0440\u0442\u0430\u0431\u0435\u043b\u044c\u043d\u044b\u0445 \u0433\u0440\u0438\u043c\u0435\u0440\u043d\u044b\u0445 \u043a\u043e\u043c\u043d\u0430\u0442.\n\u0412\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u0438 \u0438 \u0442\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u0441\u043e\u0432\u0435\u0440\u0448\u0435\u043d\u0441\u0442\u0432\u043e \u0411\u043e\u043b\u044c\u0448\u043e\u0433\u043e \u0437\u0430\u043b\u0430 \u043e\u0446\u0435\u043d\u0438\u043b\u0438 \u0432\u0435\u0434\u0443\u0449\u0438\u0435 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0435 \u0438 \u043c\u0443\u0437\u044b\u043a\u0430\u043b\u044c\u043d\u044b\u0435 \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432\u044b \u0420\u043e\u0441\u0441\u0438\u0438 \u0438 \u041c\u0438\u0440\u0430.\n\xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u043e\u0442\u043a\u0440\u044b\u0432\u0430\u0435\u0442 \u0441\u0432\u043e\u0438 \u0434\u0432\u0435\u0440\u0438 \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u043d\u0435\u0439\u0448\u0438\u043c \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u044b\u043c \u0438 \u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u043c \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432\u0430\u043c \u043d\u0430\u0448\u0435\u0439 \u0441\u0442\u0440\u0430\u043d\u044b. \u041d\u0430 \u044d\u0442\u043e\u0439 \u0441\u0446\u0435\u043d\u0435 \u0432\u044b\u0441\u0442\u0443\u043f\u0430\u043b\u0438 \u043c\u0443\u0437\u044b\u043a\u0430\u043d\u0442\u044b \u0438 \u0430\u043a\u0442\u0435\u0440\u044b, \u0447\u044c\u0438 \u0438\u043c\u0435\u043d\u0430 \u0438\u0437\u0432\u0435\u0441\u0442\u043d\u044b \u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u0438 \u0434\u0430\u043b\u0435\u043a\u043e \u0437\u0430 \u0435\u0435 \u043f\u0440\u0435\u0434\u0435\u043b\u0430\u043c\u0438. \u042d\u0442\u043e\u0442 \u0437\u0430\u043b \u0440\u0443\u043a\u043e\u043f\u043b\u0435\u0441\u043a\u0430\u043b \u0437\u0432\u0435\u0437\u0434\u0430\u043c \u043c\u0438\u0440\u043e\u0432\u043e\u0439 \u0432\u0435\u043b\u0438\u0447\u0438\u043d\u044b: \u043e\u043f\u0435\u0440\u043d\u0430\u044f \u0438 \u0431\u0430\u043b\u0435\u0442\u043d\u0430\u044f \u0442\u0440\u0443\u043f\u043f\u0430 \u041c\u0430\u0440\u0438\u0438\u043d\u0441\u043a\u043e\u0433\u043e \u0442\u0435\u0430\u0442\u0440\u0430 \u0432\u043e \u0433\u043b\u0430\u0432\u0435 \u0441 \u041c\u0430\u044d\u0441\u0442\u0440\u043e \u0412\u0430\u043b\u0435\u0440\u0438\u0435\u043c \u0413\u0435\u0440\u0433\u0438\u0435\u0432\u044b\u043c, \u0417\u0430\u0441\u043b\u0443\u0436\u0435\u043d\u043d\u044b\u0439 \u043a\u043e\u043b\u043b\u0435\u043a\u0442\u0438\u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u0410\u043a\u0430\u0434\u0435\u043c\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0441\u0438\u043c\u0444\u043e\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u043e\u0440\u043a\u0435\u0441\u0442\u0440 \u0421\u0430\u043d\u043a\u0442-\u041f\u0435\u0442\u0435\u0440\u0431\u0443\u0440\u0433\u0441\u043a\u043e\u0439 \u0444\u0438\u043b\u0430\u0440\u043c\u043e\u043d\u0438\u0438 \u043f\u043e\u0434 \u0443\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435\u043c \u042e\u0440\u0438\u044f \u0422\u0435\u043c\u0438\u0440\u043a\u0430\u043d\u043e\u0432\u0430, \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439 \u0445\u0443\u0434\u043e\u0436\u0435\u0441\u0442\u0432\u0435\u043d\u043d\u044b\u0439 \u0442\u0435\u0430\u0442\u0440 \u0438\u043c. \u0427\u0435\u0445\u043e\u0432\u0430, \u041c\u0430\u043b\u044b\u0439 \u0442\u0435\u0430\u0442\u0440-\u0442\u0435\u0430\u0442\u0440 \u0415\u0432\u0440\u043e\u043f\u044b \u041b\u044c\u0432\u0430 \u0414\u043e\u0434\u0438\u043d\u0430, \u0422\u0435\u0430\u0442\u0440 \xab\u041f\u0438\u043a\u043a\u043e\u043b\u043e \u0434\u0438 \u041c\u0438\u043b\u0430\u043d\u043e\xbb \u0438 \u043c\u043d\u043e\u0433\u0438\u0435 \u0434\u0440\u0443\u0433\u0438\u0435.\n";
		this.__311.appendChild(this._description311);
		this._userdatabrd.appendChild(this.__311);
		this.__71=document.createElement('div');
		this.__71.ggId='\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435 71'
		this.__71.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this.__71.ggVisible=false;
		hs ='position:absolute;';
		hs+='left: 7px;';
		hs+='top:  6px;';
		hs+='width: 800px;';
		hs+='height: 300px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: hidden;';
		this.__71.setAttribute('style',hs);
		this.__71__img=document.createElement('img');
		this.__71__img.setAttribute('src','images/_71.jpg');
		this.__71__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this.__71__img);
		this.__71.appendChild(this.__71__img);
		this._description71=document.createElement('div');
		this._description71.ggId='description71'
		this._description71.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._description71.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -246px;';
		hs+='top:  311px;';
		hs+='width: 801px;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: pre-wrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._description71.setAttribute('style',hs);
		this._description71.innerHTML="\u0412 \u041e\u0440\u0433\u0430\u043d\u043d\u043e\u043c \u0437\u0430\u043b\u0435 \u043d\u0430 210 \u043c\u0435\u0441\u0442 \u043f\u0440\u043e\u0445\u043e\u0434\u044f\u0442 \u043a\u0430\u043c\u0435\u0440\u043d\u044b\u0435 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u044b.\n\u0418\u043c\u0435\u043d\u043d\u043e \u0437\u0434\u0435\u0441\u044c \u0437\u0432\u0443\u0447\u0438\u0442 \u043f\u0435\u0440\u0432\u044b\u0439 \u0432 \u0420\u043e\u0441\u0441\u0438\u0438 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u044b\u0439 \u0440\u043e\u044f\u043b\u044c, \u0438\u0437\u0433\u043e\u0442\u043e\u0432\u043b\u0435\u043d\u043d\u044b\u0439 \u0437\u043d\u0430\u043c\u0435\u043d\u0438\u0442\u044b\u043c \u0438\u0442\u0430\u043b\u044c\u044f\u043d\u0441\u043a\u0438\u043c   \u043c\u0430\u0441\u0442\u0435\u0440\u043e\u043c   \u041f\u0430\u043e\u043b\u043e   \u0424\u0430\u0446\u0438\u043e\u043b\u0438 \u0434\u043b\u044f   \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430. \u0417\u0430\u043b \u0442\u0430\u043a\u0436\u0435 \u043e\u0431\u043e\u0440\u0443\u0434\u043e\u0432\u0430\u043d \u0441\u043f\u0435\u0446\u0438\u0430\u043b\u044c\u043d\u044b\u043c\u0438 \u043a\u0440\u0435\u0441\u043b\u0430\u043c\u0438, \u0447\u0442\u043e \u0434\u0435\u043b\u0430\u0435\u0442 \u0435\u0433\u043e \u0430\u043a\u0443\u0441\u0442\u0438\u043a\u0443 \u0441\u043e\u0432\u0435\u0440\u0448\u0435\u043d\u043d\u043e\u0439.\n\u0412\u0430\u0436\u043d\u043e\u0435 \u0441\u043e\u0431\u044b\u0442\u0438\u0435 \u0432 \u043a\u0443\u043b\u044c\u0442\u0443\u0440\u043d\u043e\u0439 \u0436\u0438\u0437\u043d\u0438 \u043e\u043a\u0440\u0443\u0433\u0430 \u2013 \u0438\u043d\u0430\u0443\u0433\u0443\u0440\u0430\u0446\u0438\u044f \u043e\u0440\u0433\u0430\u043d\u0430 \u042e\u0433\u0440\u044b \u2013 \u0441\u043e\u0441\u0442\u043e\u044f\u043b\u043e\u0441\u044c 29 \u0444\u0435\u0432\u0440\u0430\u043b\u044f 2008 \u0433\u043e\u0434\u0430 \u0432 \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u043c \u0446\u0435\u043d\u0442\u0440\u0435 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb. \u0421\u0442\u0440\u043e\u0438\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u0443 \u043e\u0440\u0433\u0430\u043d\u0430 \u043f\u0440\u0435\u0434\u0448\u0435\u0441\u0442\u0432\u043e\u0432\u0430\u043b\u0430 \u0441\u0435\u0440\u044c\u0435\u0437\u043d\u0430\u044f \u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u0438\u0442\u0435\u043b\u044c\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430. \u0411\u044b\u043b\u0430 \u043f\u0440\u043e\u0432\u0435\u0434\u0435\u043d\u0430 \u0440\u0435\u043a\u043e\u043d\u0441\u0442\u0440\u0443\u043a\u0446\u0438\u044f \u0441\u0446\u0435\u043d\u044b \u0438 \u0432\u043c\u043e\u043d\u0442\u0438\u0440\u043e\u0432\u0430\u043d\u0430 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u0430\u044f \u0441\u0438\u0441\u0442\u0435\u043c\u0430 \u043a\u043b\u0438\u043c\u0430\u0442-\u043a\u043e\u043d\u0442\u0440\u043e\u043b\u044f, \u043f\u043e\u0437\u0432\u043e\u043b\u044f\u044e\u0449\u0430\u044f \u043f\u043e\u0434\u0434\u0435\u0440\u0436\u0438\u0432\u0430\u0442\u044c \u0432 \u0437\u0430\u043b\u0435 \u043e\u043f\u0442\u0438\u043c\u0430\u043b\u044c\u043d\u044b\u0435 \u0434\u043b\u044f \u0438\u043d\u0441\u0442\u0440\u0443\u043c\u0435\u043d\u0442\u0430 \u043f\u0430\u0440\u0430\u043c\u0435\u0442\u0440\u044b \u0442\u0435\u043c\u043f\u0435\u0440\u0430\u0442\u0443\u0440\u044b \u0438 \u0432\u043b\u0430\u0436\u043d\u043e\u0441\u0442\u0438. \u0423\u043d\u0438\u043a\u0430\u043b\u044c\u043d\u044b\u0439 \u043f\u0440\u043e\u0435\u043a\u0442 \u043f\u043e \u0441\u043e\u0437\u0434\u0430\u043d\u0438\u044e \u0434\u0443\u0445\u043e\u0432\u043e\u0433\u043e \u043e\u0440\u0433\u0430\u043d\u0430 \u0434\u043b\u044f \u041a\u043e\u043d\u0446\u0435\u0440\u0442\u043d\u043e-\u0442\u0435\u0430\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0446\u0435\u043d\u0442\u0440\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb \u0431\u044b\u043b \u0440\u0435\u0430\u043b\u0438\u0437\u043e\u0432\u0430\u043d \u043f\u043e\u0434 \u043f\u0430\u0442\u0440\u043e\u043d\u0430\u0442\u043e\u043c \u041f\u0440\u0430\u0432\u0438\u0442\u0435\u043b\u044c\u0441\u0442\u0432\u0430 \u0410\u0432\u0442\u043e\u043d\u043e\u043c\u043d\u043e\u0433\u043e \u043e\u043a\u0440\u0443\u0433\u0430. \u041e\u0440\u0433\u0430\u043d\u043e\u0441\u0442\u0440\u043e\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0435 \u0434\u0435\u043b\u043e \u0434\u0438\u043d\u0430\u0441\u0442\u0438\u0438 \u041a\u043b\u0430\u0439\u0441, \u0432\u043e\u0442 \u0443\u0436\u0435 125 \u043b\u0435\u0442 \u0441\u043b\u0430\u0432\u044f\u0449\u0435\u0439\u0441\u044f \u0432\u044b\u0441\u043e\u043a\u0438\u043c \u043a\u0430\u0447\u0435\u0441\u0442\u0432\u043e\u043c \u0440\u0430\u0431\u043e\u0442, \u0433\u0430\u0440\u0430\u043d\u0442\u0438\u0440\u0443\u0435\u0442 \u043e\u0440\u0433\u0430\u043d\u0443 \u0434\u043e\u043b\u0433\u0443\u044e \u0438 \u0442\u0432\u043e\u0440\u0447\u0435\u0441\u043a\u0443\u044e \u0436\u0438\u0437\u043d\u044c.\n\u0422\u0435\u0445\u043d\u0438\u0447\u0435\u0441\u043a\u0438\u0435 \u043f\u0430\u0440\u0430\u043c\u0435\u0442\u0440\u044b \u043e\u0440\u0433\u0430\u043d\u0430 \xab\u042e\u0433\u0440\u0430-\u041a\u043b\u0430\u0441\u0441\u0438\u043a\xbb: \u043e\u0431\u0449\u0430\u044f \u0432\u044b\u0441\u043e\u0442\u0430 \u043e\u0440\u0433\u0430\u043d\u0430 - 8 \u043c\u0435\u0442\u0440\u043e\u0432, \u0432\u0435\u0441 - 10 \u0442\u043e\u043d\u043d; 34 \u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0430; 3 \u043c\u0430\u043d\u0443\u0430\u043b\u0430 \u0438 \u043f\u0435\u0434\u0430\u043b\u044c\u043d\u0430\u044f \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0430, \u0438\u0433\u0440\u043e\u0432\u0430\u044f \u0442\u0440\u0430\u043a\u0442\u0443\u0440\u0430 - \u043c\u0435\u0445\u0430\u043d\u0438\u0447\u0435\u0441\u043a\u0430\u044f; \u0440\u0435\u0433\u0438\u0441\u0442\u0440\u043e\u0432\u0430\u044f \u0442\u0440\u0430\u043a\u0442\u0443\u0440\u0430 - \u044d\u043b\u0435\u043a\u0442\u0440\u0438\u0447\u0435\u0441\u043a\u0430\u044f, \u0441\u043d\u0430\u0431\u0436\u0435\u043d\u0430 \u0437\u0430\u043f\u043e\u043c\u0438\u043d\u0430\u044e\u0449\u0435\u0439\u0441\u044f \u0441\u0438\u0441\u0442\u0435\u043c\u043e\u0439 \u043f\u0430\u043c\u044f\u0442\u0438 \u0432 4000 \u043a\u043e\u043c\u0431\u0438\u043d\u0430\u0446\u0438\u0439; \u043a\u043e\u043b\u0438\u0447\u0435\u0441\u0442\u0432\u043e \u043a\u043b\u0430\u0432\u0438\u0448 \u043d\u0430 \u043c\u0430\u043d\u0443\u0430\u043b\u0430\u0445 - 58 (5 \u043e\u043a\u0442\u0430\u0432), \u043d\u0430 \u043f\u0435\u0434\u0430\u043b\u044c\u043d\u043e\u0439 \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0435 - 30 (2,5 \u043e\u043a\u0442\u0430\u0432\u044b). \u041e\u0440\u0433\u0430\u043d \u0441\u043d\u0430\u0431\u0436\u0435\u043d \u0432\u0441\u0435\u043c\u0438 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u044b\u043c\u0438 \u043a\u043e\u043f\u0443\u043b\u044f\u0446\u0438\u044f\u043c\u0438 \u0438 \u0448\u0432\u0435\u043b\u043b\u0435\u0440\u043e\u043c.\n\u0423\u043d\u0438\u043a\u0430\u043b\u0435\u043d \u044d\u043b\u0435\u0433\u0430\u043d\u0442\u043d\u044b\u0439 \u0434\u0438\u0437\u0430\u0439\u043d \u043e\u0440\u0433\u0430\u043d\u0430: \u0435\u0433\u043e \u043a\u043b\u0430\u0432\u0438\u0430\u0442\u0443\u0440\u0430 \u043e\u0442\u0434\u0435\u043b\u0430\u043d\u0430 \u043a\u043e\u0441\u0442\u044c\u044e \u043c\u0430\u043c\u043e\u043d\u0442\u0430. \u041e\u043f\u044b\u0442\u043d\u044b\u0435 \u043a\u043e\u0441\u0442\u043e\u0440\u0435\u0437\u044b \u043e\u043a\u0440\u0443\u0436\u043d\u043e\u0433\u043e \u0426\u0435\u043d\u0442\u0440\u0430 \u0440\u0435\u043c\u0451\u0441\u0435\u043b \u0438 \u043d\u0430\u0440\u043e\u0434\u043d\u044b\u0445 \u043f\u0440\u043e\u043c\u044b\u0441\u043b\u043e\u0432 \u0432\u044b\u043f\u0438\u043b\u0438\u043b\u0438 \u0438\u0437 \u0431\u0438\u0432\u043d\u0435\u0439 \u043c\u0430\u043c\u043e\u043d\u0442\u0435\u043d\u043a\u0430, \u043f\u0440\u043e\u043b\u0435\u0436\u0430\u0432\u0448\u0435\u0433\u043e \u0432 \u0432\u0435\u0447\u043d\u043e\u0439 \u043c\u0435\u0440\u0437\u043b\u043e\u0442\u0435 \u043e\u043a\u043e\u043b\u043e 500 000 \u043b\u0435\u0442, \u0431\u043e\u043b\u0435\u0435 \u0441\u043e\u0442\u043d\u0438 \u0442\u043e\u043d\u0447\u0430\u0439\u0448\u0438\u0445 \u043f\u043b\u0430\u0441\u0442\u0438\u043d \u0434\u043b\u044f \u043a\u043b\u0430\u0432\u0438\u0448.\n\u041f\u043e\u0447\u0435\u0442\u043d\u043e\u0435 \u043f\u0440\u0430\u0432\u043e \u043e\u0442\u043a\u0440\u044b\u0442\u044c \u043e\u0440\u0433\u0430\u043d \u042e\u0433\u0440\u044b \u0431\u044b\u043b \u0443\u0434\u043e\u0441\u0442\u043e\u0435\u043d \u043f\u0440\u043e\u0444\u0435\u0441\u0441\u043e\u0440 \u041a\u0451\u043b\u044c\u043d\u0441\u043a\u043e\u0433\u043e \u0443\u043d\u0438\u0432\u0435\u0440\u0441\u0438\u0442\u0435\u0442\u0430, \u0433\u043b\u0430\u0432\u043d\u044b\u0439 \u043e\u0440\u0433\u0430\u043d\u0438\u0441\u0442 \u041a\u0435\u043b\u044c\u043d\u0441\u043a\u043e\u0433\u043e \u043a\u0430\u0444\u0435\u0434\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0441\u043e\u0431\u043e\u0440\u0430 \u0412\u0438\u043d\u0444\u0440\u0438\u0434 \u0411\u0451\u043d\u0438\u0433. \u041f\u043e \u043e\u043a\u043e\u043d\u0447\u0430\u043d\u0438\u0438 \u043a\u043e\u043d\u0446\u0435\u0440\u0442\u0430 \u0412\u0438\u043d\u0444\u0440\u0438\u0434 \u0411\u0451\u043d\u0438\u0433 \u0432\u043e\u0441\u043a\u043b\u0438\u043a\u043d\u0443\u043b: \xab\u041e\u0440\u0433\u0430\u043d \u0432\u0435\u043b\u0438\u043a\u043e\u043b\u0435\u043f\u043d\u044b\u0439! \u041e\u0434\u0438\u043d \u0438\u0437 \u043b\u0443\u0447\u0448\u0438\u0445 \u043a\u0430\u043c\u0435\u0440\u043d\u044b\u0445 \u043e\u0440\u0433\u0430\u043d\u043e\u0432 \u0415\u0432\u0440\u043e\u043f\u044b!\xbb\n";
		this.__71.appendChild(this._description71);
		this._userdatabrd.appendChild(this.__71);
		this._kabinet1.appendChild(this._userdatabrd);
		this.divSkin.appendChild(this._kabinet1);
		me._mhs_loc.style.webkitTransition='none';
		me._mhs_loc.ggParameter.rx=110;me._mhs_loc.ggParameter.ry=231;
		me._mhs_loc.style.webkitTransform=parameterToTransform(me._mhs_loc.ggParameter);
		me._mhs_dot.style.webkitTransition='none';
		me._mhs_dot.ggParameter.a=42.2;
		me._mhs_dot.style.webkitTransform=parameterToTransform(me._mhs_dot.ggParameter);
		this.divSkin.ggUpdateSize=function(w,h) {
			me.updateSize(me.divSkin);
		}
		this.divSkin.ggLoaded=function() {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='hidden';
			me._loading.ggVisible=false;
		}
		this.divSkin.ggReLoaded=function() {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='inherit';
			me._loading.ggVisible=true;
		}
		this.divSkin.ggEnterFullscreen=function() {
		}
		this.divSkin.ggExitFullscreen=function() {
		}
		this.skinTimerEvent();
	};
	this.hotspotProxyClick=function(id) {
		if (id=='strauss_video') {
			me._video_stopsound.onclick();
		}
		if (id=='vyhod') {
			me._mhs_01.onclick();
		}
		if (id=='vena') {
			me._mhs_02.onclick();
		}
		if (id=='sovet') {
			me._mhs_03.onclick();
		}
		if (id=='trans') {
			me._mhs_04.onclick();
		}
		if (id=='organ') {
			me._mhs_05.onclick();
		}
		if (id=='press') {
			me._mhs_06.onclick();
		}
		if (id=='ulicavena') {
			me._mhs_07.onclick();
		}
		if (id=='2flot') {
			me._mhs_08.onclick();
		}
		if (id=='oniks1') {
			me._mhs_09.onclick();
		}
		if (id=='lenina') {
			me._mhs_10.onclick();
		}
		if (id=='art') {
			me._mhs_11.onclick();
		}
		if (id=='zal') {
			me._mhs_12.onclick();
		}
	}
	this.hotspotProxyOver=function(id) {
		if (id=='vyhod') {
			me._mhs_01.onmouseover();
		}
		if (id=='vena') {
			me._mhs_02.onmouseover();
		}
		if (id=='sovet') {
			me._mhs_03.onmouseover();
		}
		if (id=='trans') {
			me._mhs_04.onmouseover();
		}
		if (id=='organ') {
			me._mhs_05.onmouseover();
		}
		if (id=='press') {
			me._mhs_06.onmouseover();
		}
		if (id=='ulicavena') {
			me._mhs_07.onmouseover();
		}
		if (id=='2flot') {
			me._mhs_08.onmouseover();
		}
		if (id=='oniks1') {
			me._mhs_09.onmouseover();
		}
		if (id=='lenina') {
			me._mhs_10.onmouseover();
		}
		if (id=='art') {
			me._mhs_11.onmouseover();
		}
		if (id=='zal') {
			me._mhs_12.onmouseover();
		}
	}
	this.hotspotProxyOut=function(id) {
		if (id=='vyhod') {
			me._mhs_01.onmouseout();
		}
		if (id=='vena') {
			me._mhs_02.onmouseout();
		}
		if (id=='sovet') {
			me._mhs_03.onmouseout();
		}
		if (id=='trans') {
			me._mhs_04.onmouseout();
		}
		if (id=='organ') {
			me._mhs_05.onmouseout();
		}
		if (id=='press') {
			me._mhs_06.onmouseout();
		}
		if (id=='ulicavena') {
			me._mhs_07.onmouseout();
		}
		if (id=='2flot') {
			me._mhs_08.onmouseout();
		}
		if (id=='oniks1') {
			me._mhs_09.onmouseout();
		}
		if (id=='lenina') {
			me._mhs_10.onmouseout();
		}
		if (id=='art') {
			me._mhs_11.onmouseout();
		}
		if (id=='zal') {
			me._mhs_12.onmouseout();
		}
	}
	this.skinTimerEvent=function() {
		setTimeout(function() { me.skinTimerEvent(); }, 10);
		if (me.elementMouseDown['up']) {
			me.player.changeTilt(1,true);
		}
		if (me.elementMouseDown['down']) {
			me.player.changeTilt(-1,true);
		}
		if (me.elementMouseDown['left']) {
			me.player.changePan(1,true);
		}
		if (me.elementMouseDown['right']) {
			me.player.changePan(-1,true);
		}
		if (me.elementMouseDown['button_zoom_in']) {
			me.player.changeFovLog(-0.4,true);
		}
		if (me.elementMouseDown['button_zoom_out']) {
			me.player.changeFovLog(0.4,true);
		}
		this._loadingtext.ggUpdateText();
		var hs='';
		if (me._loadingbar.ggParameter) {
			hs+=parameterToTransform(me._loadingbar.ggParameter) + ' ';
		}
		hs+='scale(' + (1 * me.player.getPercentLoaded() + 0) + ',1.0) ';
		me._loadingbar.style.webkitTransform=hs;
		if (me.elementMouseOver['mhs_01']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__1.style.webkitTransition='none';
			me.__1.style.visibility='inherit';
			me.__1.ggVisible=true;
			me._description1.style.webkitTransition='none';
			me._description1.style.visibility='inherit';
			me._description1.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_02']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__4.style.webkitTransition='none';
			me.__4.style.visibility='inherit';
			me.__4.ggVisible=true;
			me._description4.style.webkitTransition='none';
			me._description4.style.visibility='inherit';
			me._description4.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_03']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__5.style.webkitTransition='none';
			me.__5.style.visibility='inherit';
			me.__5.ggVisible=true;
			me._description5.style.webkitTransition='none';
			me._description5.style.visibility='inherit';
			me._description5.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_04']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__6.style.webkitTransition='none';
			me.__6.style.visibility='inherit';
			me.__6.ggVisible=true;
			me._description6.style.webkitTransition='none';
			me._description6.style.visibility='inherit';
			me._description6.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_05']) {
			me._kabinet1.style.webkitTransition='none';
			me._kabinet1.style.visibility='inherit';
			me._kabinet1.ggVisible=true;
			me.__71.style.webkitTransition='none';
			me.__71.style.visibility='inherit';
			me.__71.ggVisible=true;
			me._description71.style.webkitTransition='none';
			me._description71.style.visibility='inherit';
			me._description71.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_06']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__8.style.webkitTransition='none';
			me.__8.style.visibility='inherit';
			me.__8.ggVisible=true;
			me._description8.style.webkitTransition='none';
			me._description8.style.visibility='inherit';
			me._description8.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_07']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__10.style.webkitTransition='none';
			me.__10.style.visibility='inherit';
			me.__10.ggVisible=true;
			me._description10.style.webkitTransition='none';
			me._description10.style.visibility='inherit';
			me._description10.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_08']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__12.style.webkitTransition='none';
			me.__12.style.visibility='inherit';
			me.__12.ggVisible=true;
			me._description12.style.webkitTransition='none';
			me._description12.style.visibility='inherit';
			me._description12.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_09']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__9.style.webkitTransition='none';
			me.__9.style.visibility='inherit';
			me.__9.ggVisible=true;
			me._description9.style.webkitTransition='none';
			me._description9.style.visibility='inherit';
			me._description9.ggVisible=true;
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__9.style.webkitTransition='none';
			me.__9.style.visibility='inherit';
			me.__9.ggVisible=true;
			me._description9.style.webkitTransition='none';
			me._description9.style.visibility='inherit';
			me._description9.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_10']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__11.style.webkitTransition='none';
			me.__11.style.visibility='inherit';
			me.__11.ggVisible=true;
			me._description11.style.webkitTransition='none';
			me._description11.style.visibility='inherit';
			me._description11.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_11']) {
			me._kabinet.style.webkitTransition='none';
			me._kabinet.style.visibility='inherit';
			me._kabinet.ggVisible=true;
			me.__2.style.webkitTransition='none';
			me.__2.style.visibility='inherit';
			me.__2.ggVisible=true;
			me._description2.style.webkitTransition='none';
			me._description2.style.visibility='inherit';
			me._description2.ggVisible=true;
		}
		if (me.elementMouseOver['mhs_12']) {
			me._kabinet1.style.webkitTransition='none';
			me._kabinet1.style.visibility='inherit';
			me._kabinet1.ggVisible=true;
			me.__311.style.webkitTransition='none';
			me.__311.style.visibility='inherit';
			me.__311.ggVisible=true;
			me._description311.style.webkitTransition='none';
			me._description311.style.visibility='inherit';
			me._description311.ggVisible=true;
		}
		var hs='';
		if (me._mhs_dot.ggParameter) {
			hs+=parameterToTransform(me._mhs_dot.ggParameter) + ' ';
		}
		hs+='rotate(' + (-1.0*(1 * me.player.getPanN() + 0)) + 'deg) ';
		me._mhs_dot.style.webkitTransform=hs;
	};
	function SkinHotspotClass(skinObj,hotspot) {
		var me=this;
		var flag=false;
		this.player=skinObj.player;
		this.skin=skinObj;
		this.hotspot=hotspot;
		this.__div=document.createElement('div');
		this.__div.setAttribute('style','position:absolute; left:0px;top:0px;visibility: inherit;');
		if (hotspot.skinid=='hs') {
			this.__div=document.createElement('div');
			this.__div.ggId='hs'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=false;
			hs ='position:absolute;';
			hs+='left: 778px;';
			hs+='top:  19px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._hs_image12=document.createElement('div');
			this._hs_image12.ggId='hs_image'
			this._hs_image12.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image12.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image12.setAttribute('style',hs);
			this._hs_image12__img=document.createElement('img');
			this._hs_image12__img.setAttribute('src','images/hs_image12.svg');
			this._hs_image12__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image12.appendChild(this._hs_image12__img);
			this.__div.appendChild(this._hs_image12);
		} else
		if (hotspot.skinid=='lf') {
			this.__div=document.createElement('div');
			this.__div.ggId='lf'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 16px;';
			hs+='top:  582px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
		} else
		if (hotspot.skinid=='hs_video') {
			this.__div=document.createElement('div');
			this.__div.ggId='hs_video'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 300px;';
			hs+='top:  114px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me._skin.video.innerHTML=me.hotspot.title;
				if (me._skin.video.ggUpdateText) {
					me._skin.video.ggUpdateText=function() {
						me._skin.video.innerHTML=me.hotspot.title;
					}
				}
				if (me.player.transitionsDisabled) {
					me._skin.video_bg.style.webkitTransition='none';
				} else {
					me._skin.video_bg.style.webkitTransition='all 500ms ease-out 0ms';
				}
				me._skin.video_bg.style.opacity='1';
				me._skin.video_bg.style.visibility=me._skin.video_bg.ggVisible?'inherit':'hidden';
				me._skin.video.style.webkitTransition='none';
				me._skin.video.style.visibility='inherit';
				me._skin.video.ggVisible=true;
				if (me.player.transitionsDisabled) {
					me._skin.screen_tint.style.webkitTransition='none';
				} else {
					me._skin.screen_tint.style.webkitTransition='all 500ms ease-out 0ms';
				}
				me._skin.screen_tint.style.opacity='1';
				me._skin.screen_tint.style.visibility=me._skin.screen_tint.ggVisible?'inherit':'hidden';
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._video_image=document.createElement('div');
			this._video_image.ggId='video_image'
			this._video_image.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._video_image.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 331px;';
			hs+='top:  503px;';
			hs+='width: 50px;';
			hs+='height: 50px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._video_image.setAttribute('style',hs);
			this._video_image__img=document.createElement('img');
			this._video_image__img.setAttribute('src','images/video_image.svg');
			this._video_image__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 50px;height: 50px;');
			this._video_image.appendChild(this._video_image__img);
			this.__div.appendChild(this._video_image);
		} else
		if (hotspot.skinid=='oniks1') {
			this.__div=document.createElement('div');
			this.__div.ggId='oniks1'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 677px;';
			hs+='top:  40px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__52.style.webkitTransition='none';
				me.__52.style.visibility='hidden';
				me.__52.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image11=document.createElement('div');
			this._hs_image11.ggId='hs_image'
			this._hs_image11.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image11.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image11.setAttribute('style',hs);
			this._hs_image11__img=document.createElement('img');
			this._hs_image11__img.setAttribute('src','images/hs_image11.svg');
			this._hs_image11__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image11.appendChild(this._hs_image11__img);
			this.__div.appendChild(this._hs_image11);
			this.__52=document.createElement('div');
			this.__52.ggId='\u0422\u0435\u043a\u0441\u0442 52'
			this.__52.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__52.ggVisible=false;
			this.__52.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__52.setAttribute('style',hs);
			this.__52.innerHTML="\u0424\u043e\u0439\u0435 \"\u0421\u0432\u0435\u0442 \u043e\u043d\u0438\u043a\u0441\u0430\"";
			this.__div.appendChild(this.__52);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__52.style.webkitTransition='none';
					me.__52.style.visibility='inherit';
					me.__52.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='ulicavena') {
			this.__div=document.createElement('div');
			this.__div.ggId='ulicavena'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 871px;';
			hs+='top:  69px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__53.style.webkitTransition='none';
				me.__53.style.visibility='hidden';
				me.__53.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image10=document.createElement('div');
			this._hs_image10.ggId='hs_image'
			this._hs_image10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image10.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image10.setAttribute('style',hs);
			this._hs_image10__img=document.createElement('img');
			this._hs_image10__img.setAttribute('src','images/hs_image10.svg');
			this._hs_image10__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image10.appendChild(this._hs_image10__img);
			this.__div.appendChild(this._hs_image10);
			this.__53=document.createElement('div');
			this.__53.ggId='\u0422\u0435\u043a\u0441\u0442 53'
			this.__53.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__53.ggVisible=false;
			this.__53.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__53.setAttribute('style',hs);
			this.__53.innerHTML="\u0412\u0438\u0434 \u0441\u043e \u0441\u0442\u043e\u0440\u043e\u043d\u044b \u0412\u0435\u043d\u0441\u043a\u043e\u0433\u043e \u043a\u0430\u0444\u0435";
			this.__div.appendChild(this.__53);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__53.style.webkitTransition='none';
					me.__53.style.visibility='inherit';
					me.__53.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='vyhod') {
			this.__div=document.createElement('div');
			this.__div.ggId='vyhod'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1084px;';
			hs+='top:  69px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__54.style.webkitTransition='none';
				me.__54.style.visibility='hidden';
				me.__54.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image9=document.createElement('div');
			this._hs_image9.ggId='hs_image'
			this._hs_image9.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image9.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image9.setAttribute('style',hs);
			this._hs_image9__img=document.createElement('img');
			this._hs_image9__img.setAttribute('src','images/hs_image9.svg');
			this._hs_image9__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image9.appendChild(this._hs_image9__img);
			this.__div.appendChild(this._hs_image9);
			this.__54=document.createElement('div');
			this.__54.ggId='\u0422\u0435\u043a\u0441\u0442 54'
			this.__54.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__54.ggVisible=false;
			this.__54.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__54.setAttribute('style',hs);
			this.__54.innerHTML="\u0412\u044b\u0445\u043e\u0434 \u043d\u0430 \u0443\u043b\u0438\u0446\u0443";
			this.__div.appendChild(this.__54);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__54.style.webkitTransition='none';
					me.__54.style.visibility='inherit';
					me.__54.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='vyhod1') {
			this.__div=document.createElement('div');
			this.__div.ggId='vyhod1'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1317px;';
			hs+='top:  87px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__55.style.webkitTransition='none';
				me.__55.style.visibility='hidden';
				me.__55.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image8=document.createElement('div');
			this._hs_image8.ggId='hs_image'
			this._hs_image8.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image8.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image8.setAttribute('style',hs);
			this._hs_image8__img=document.createElement('img');
			this._hs_image8__img.setAttribute('src','images/hs_image8.svg');
			this._hs_image8__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image8.appendChild(this._hs_image8__img);
			this.__div.appendChild(this._hs_image8);
			this.__55=document.createElement('div');
			this.__55.ggId='\u0422\u0435\u043a\u0441\u0442 55'
			this.__55.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__55.ggVisible=false;
			this.__55.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__55.setAttribute('style',hs);
			this.__55.innerHTML="\u0412\u0438\u0434 \u0441\u043e \u0441\u0442\u043e\u0440\u043e\u043d\u044b \u0446\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u043e\u0433\u043e \u0432\u0445\u043e\u0434\u0430";
			this.__div.appendChild(this.__55);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__55.style.webkitTransition='none';
					me.__55.style.visibility='inherit';
					me.__55.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='vena') {
			this.__div=document.createElement('div');
			this.__div.ggId='vena'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1332px;';
			hs+='top:  197px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__56.style.webkitTransition='none';
				me.__56.style.visibility='hidden';
				me.__56.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image7=document.createElement('div');
			this._hs_image7.ggId='hs_image'
			this._hs_image7.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image7.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image7.setAttribute('style',hs);
			this._hs_image7__img=document.createElement('img');
			this._hs_image7__img.setAttribute('src','images/hs_image7.svg');
			this._hs_image7__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image7.appendChild(this._hs_image7__img);
			this.__div.appendChild(this._hs_image7);
			this.__56=document.createElement('div');
			this.__56.ggId='\u0422\u0435\u043a\u0441\u0442 56'
			this.__56.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__56.ggVisible=false;
			this.__56.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__56.setAttribute('style',hs);
			this.__56.innerHTML="\u0412\u0435\u043d\u0441\u043a\u043e\u0435 \u043a\u0430\u0444\u0435";
			this.__div.appendChild(this.__56);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__56.style.webkitTransition='none';
					me.__56.style.visibility='inherit';
					me.__56.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='lenina') {
			this.__div=document.createElement('div');
			this.__div.ggId='lenina'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1450px;';
			hs+='top:  264px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__57.style.webkitTransition='none';
				me.__57.style.visibility='hidden';
				me.__57.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image6=document.createElement('div');
			this._hs_image6.ggId='hs_image'
			this._hs_image6.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image6.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image6.setAttribute('style',hs);
			this._hs_image6__img=document.createElement('img');
			this._hs_image6__img.setAttribute('src','images/hs_image6.svg');
			this._hs_image6__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image6.appendChild(this._hs_image6__img);
			this.__div.appendChild(this._hs_image6);
			this.__57=document.createElement('div');
			this.__57.ggId='\u0422\u0435\u043a\u0441\u0442 57'
			this.__57.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__57.ggVisible=false;
			this.__57.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__57.setAttribute('style',hs);
			this.__57.innerHTML="\u0412\u0438\u0434 \u0441\u043e \u0441\u0442\u043e\u0440\u043e\u043d\u044b \u0443\u043b\u0438\u0446\u044b \u041b\u0435\u043d\u0438\u043d\u0430";
			this.__div.appendChild(this.__57);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__57.style.webkitTransition='none';
					me.__57.style.visibility='inherit';
					me.__57.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='2flot') {
			this.__div=document.createElement('div');
			this.__div.ggId='2flot'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1409px;';
			hs+='top:  328px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__58.style.webkitTransition='none';
				me.__58.style.visibility='hidden';
				me.__58.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image5=document.createElement('div');
			this._hs_image5.ggId='hs_image'
			this._hs_image5.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image5.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image5.setAttribute('style',hs);
			this._hs_image5__img=document.createElement('img');
			this._hs_image5__img.setAttribute('src','images/hs_image5.svg');
			this._hs_image5__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image5.appendChild(this._hs_image5__img);
			this.__div.appendChild(this._hs_image5);
			this.__58=document.createElement('div');
			this.__58.ggId='\u0422\u0435\u043a\u0441\u0442 58'
			this.__58.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__58.ggVisible=false;
			this.__58.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__58.setAttribute('style',hs);
			this.__58.innerHTML="\u0424\u043e\u0439\u0435 2-\u0433\u043e \u044d\u0442\u0430\u0436\u0430";
			this.__div.appendChild(this.__58);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__58.style.webkitTransition='none';
					me.__58.style.visibility='inherit';
					me.__58.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='trans') {
			this.__div=document.createElement('div');
			this.__div.ggId='trans'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1288px;';
			hs+='top:  354px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__59.style.webkitTransition='none';
				me.__59.style.visibility='hidden';
				me.__59.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image4=document.createElement('div');
			this._hs_image4.ggId='hs_image'
			this._hs_image4.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image4.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image4.setAttribute('style',hs);
			this._hs_image4__img=document.createElement('img');
			this._hs_image4__img.setAttribute('src','images/hs_image4.svg');
			this._hs_image4__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image4.appendChild(this._hs_image4__img);
			this.__div.appendChild(this._hs_image4);
			this.__59=document.createElement('div');
			this.__59.ggId='\u0422\u0435\u043a\u0441\u0442 59'
			this.__59.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__59.ggVisible=false;
			this.__59.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__59.setAttribute('style',hs);
			this.__59.innerHTML="\u0417\u0430\u043b-\u0441\u0442\u0443\u0434\u0438\u044f \"\u0422\u0440\u0430\u043d\u0441\u0444\u043e\u0440\u043c\u0435\u0440\"";
			this.__div.appendChild(this.__59);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__59.style.webkitTransition='none';
					me.__59.style.visibility='inherit';
					me.__59.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='organ') {
			this.__div=document.createElement('div');
			this.__div.ggId='organ'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1568px;';
			hs+='top:  358px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__60.style.webkitTransition='none';
				me.__60.style.visibility='hidden';
				me.__60.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image3=document.createElement('div');
			this._hs_image3.ggId='hs_image'
			this._hs_image3.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image3.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image3.setAttribute('style',hs);
			this._hs_image3__img=document.createElement('img');
			this._hs_image3__img.setAttribute('src','images/hs_image3.svg');
			this._hs_image3__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image3.appendChild(this._hs_image3__img);
			this.__div.appendChild(this._hs_image3);
			this.__60=document.createElement('div');
			this.__60.ggId='\u0422\u0435\u043a\u0441\u0442 60'
			this.__60.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__60.ggVisible=false;
			this.__60.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__60.setAttribute('style',hs);
			this.__60.innerHTML="\u041e\u0440\u0433\u0430\u043d\u043d\u044b\u0439 \u0437\u0430\u043b";
			this.__div.appendChild(this.__60);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__60.style.webkitTransition='none';
					me.__60.style.visibility='inherit';
					me.__60.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='art') {
			this.__div=document.createElement('div');
			this.__div.ggId='art'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1561px;';
			hs+='top:  260px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__61.style.webkitTransition='none';
				me.__61.style.visibility='hidden';
				me.__61.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image2=document.createElement('div');
			this._hs_image2.ggId='hs_image'
			this._hs_image2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image2.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image2.setAttribute('style',hs);
			this._hs_image2__img=document.createElement('img');
			this._hs_image2__img.setAttribute('src','images/hs_image2.svg');
			this._hs_image2__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image2.appendChild(this._hs_image2__img);
			this.__div.appendChild(this._hs_image2);
			this.__61=document.createElement('div');
			this.__61.ggId='\u0422\u0435\u043a\u0441\u0442 61'
			this.__61.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__61.ggVisible=false;
			this.__61.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__61.setAttribute('style',hs);
			this.__61.innerHTML="\u0410\u0440\u0442-\u043a\u0430\u0444\u0435";
			this.__div.appendChild(this.__61);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__61.style.webkitTransition='none';
					me.__61.style.visibility='inherit';
					me.__61.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='press') {
			this.__div=document.createElement('div');
			this.__div.ggId='press'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1561px;';
			hs+='top:  260px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__62.style.webkitTransition='none';
				me.__62.style.visibility='hidden';
				me.__62.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image1=document.createElement('div');
			this._hs_image1.ggId='hs_image'
			this._hs_image1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image1.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image1.setAttribute('style',hs);
			this._hs_image1__img=document.createElement('img');
			this._hs_image1__img.setAttribute('src','images/hs_image1.svg');
			this._hs_image1__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image1.appendChild(this._hs_image1__img);
			this.__div.appendChild(this._hs_image1);
			this.__62=document.createElement('div');
			this.__62.ggId='\u0422\u0435\u043a\u0441\u0442 62'
			this.__62.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__62.ggVisible=false;
			this.__62.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__62.setAttribute('style',hs);
			this.__62.innerHTML="\u041f\u0440\u0435\u0441\u0441-\u0437\u0430\u043b";
			this.__div.appendChild(this.__62);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__62.style.webkitTransition='none';
					me.__62.style.visibility='inherit';
					me.__62.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		if (hotspot.skinid=='sovet') {
			this.__div=document.createElement('div');
			this.__div.ggId='sovet'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1561px;';
			hs+='top:  260px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__63.style.webkitTransition='none';
				me.__63.style.visibility='hidden';
				me.__63.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image0=document.createElement('div');
			this._hs_image0.ggId='hs_image'
			this._hs_image0.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image0.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image0.setAttribute('style',hs);
			this._hs_image0__img=document.createElement('img');
			this._hs_image0__img.setAttribute('src','images/hs_image0.svg');
			this._hs_image0__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image0.appendChild(this._hs_image0__img);
			this.__div.appendChild(this._hs_image0);
			this.__63=document.createElement('div');
			this.__63.ggId='\u0422\u0435\u043a\u0441\u0442 63'
			this.__63.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__63.ggVisible=false;
			this.__63.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__63.setAttribute('style',hs);
			this.__63.innerHTML="\u0417\u0430\u043b \u0434\u043b\u044f \u0441\u043e\u0432\u0435\u0449\u0430\u043d\u0438\u0439 \u0438 \u043f\u0440\u0435\u0441\u0441-\u043a\u043e\u043d\u0444\u0435\u0440\u0435\u043d\u0446\u0438\u0439";
			this.__div.appendChild(this.__63);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__63.style.webkitTransition='none';
					me.__63.style.visibility='inherit';
					me.__63.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		} else
		{
			this.__div=document.createElement('div');
			this.__div.ggId='zal'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 1561px;';
			hs+='top:  260px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.elementMouseOver['_div']=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.__64.style.webkitTransition='none';
				me.__64.style.visibility='hidden';
				me.__64.ggVisible=false;
				me.elementMouseOver['_div']=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this.__div.ontouchend=function () {
				me.elementMouseOver['_div']=false;
			}
			this._hs_image=document.createElement('div');
			this._hs_image.ggId='hs_image'
			this._hs_image.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hs_image.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -15px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hs_image.setAttribute('style',hs);
			this._hs_image__img=document.createElement('img');
			this._hs_image__img.setAttribute('src','images/hs_image.svg');
			this._hs_image__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hs_image.appendChild(this._hs_image__img);
			this.__div.appendChild(this._hs_image);
			this.__64=document.createElement('div');
			this.__64.ggId='\u0422\u0435\u043a\u0441\u0442 64'
			this.__64.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__64.ggVisible=false;
			this.__64.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-49 + (101-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -49px;';
			hs+='top:  -31px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 0px solid #000000;';
			hs+='color: #ffffff;';
			hs+='background-color: #000000;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this.__64.setAttribute('style',hs);
			this.__64.innerHTML="\u0411\u043e\u043b\u044c\u0448\u043e\u0439 \u0437\u0430\u043b";
			this.__div.appendChild(this.__64);
			this.hotspotTimerEvent=function() {
				setTimeout(function() { me.hotspotTimerEvent(); }, 10);
				if (me.elementMouseOver['_div']) {
					me.__64.style.webkitTransition='none';
					me.__64.style.visibility='inherit';
					me.__64.ggVisible=true;
				}
			}
			this.hotspotTimerEvent();
		}
	};
	this.addSkinHotspot=function(hotspot) {
		return new SkinHotspotClass(me,hotspot);
	}
	this.addSkin();
};