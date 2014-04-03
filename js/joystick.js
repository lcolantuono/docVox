/**
					 * Sprite is a simple wrapper around an IMAGE tag, allowing the creation
					 * and movement of a graphic element.
					 */
					function Sprite(src, x, y) {
					        this._image = document.createElement("IMG");
					        this._image.src = src;
					        this._image.style.position = "absolute";
					
					        this.x = x;
					        this.y = y;
					
					        this.draw();
					}
					
					Sprite.prototype.addToElement = function(element) {
					        element.appendChild(this._image);
					};
					
					/**
					 * Updates the sprite's position.
					 */
					Sprite.prototype.draw = function() {
					        this._image.style.left = this.x + "px";
					        this._image.style.top  = this.y + "px";
					};
					
					/****************************************************************************/
					
					/**
					 * Milliseconds between each frame.
					 */
					var INTERVAL = 50;
					
					var sheep;
					var stick;
					
					/**
					 * Create and add a sprite to the page, then create the joystick wrapper, and
					 * finally start the draw loop.
					 */
					function init () {
							
					        sheep = new Sprite("killer_sheep.gif", 64, 64);
					        //sheep.addToElement(document.body);
					        
					        stick = new Joystick();

					        //document.getElementById("btnReproducir").click();
					        
					        loop();
					        
					}
					
					/**
					 * Check if the stick axes are outside of the 'deadzone', update the sheep's
					 * position with the scaled values, then rince and repeat.
					 */
					function loop() {
						 
					        var x = stick.getX();
					        if (x < 28672 || x > 36864) {
					                sheep.x += (x - 32768) / 2048;
					                if (sheep.x < 0) {
					                        sheep.x = 0;
					                }
					                document.getElementById("btnAnterior").click();
					        }
					        var y = stick.getY();
					        if (y < 28672 || y > 36864) {
					                sheep.y += (y - 32768) / 2048;
					                if (sheep.y < 0) {
					                        sheep.y = 0;
					                }
					                document.getElementById("btnSiguiente").click();
					        }
					        
					
					        //if (stick.getA()){document.getElementById("btnReproducir").click();}
					        //if (stick.getB()){document.getElementById("btnPausar").click();}
							
							var aux = stick.getButtons();
							
							if(aux!=0){
								document.getElementById("aux").innerHTML+=aux+" - ";
							}
							
							if (aux==2){document.getElementById("Avance").click();}
							if (aux==8){document.getElementById("Retroceso").click();}
							if (aux==1){document.getElementById("btnPausar").click();}
							
					        sheep.draw();
					       
					        //setTimeout("loop()", INTERVAL);
					        setTimeout("loop()", 200);
					}

/**
 * Wrapper for the joystick plug-in/ActiveX control. For each new Joystick
 * instance a counterpart plug-in is created, allowing user code transparent
 * access to game controllers regardless of the platform. Should the plug-in
 * creation fail, default (unpressed) values are returned for each method.
 */
function Joystick() {
        this.ctl = Joystick.createPlugin();
}

/**
 * Constant for a stick's axis center.
 */
Joystick.CENTER = 32768;

/**
 * Reads the controller's main stick x-axis.
 *
 * @return a value between 0 and 65535 (with 0 being extreme left and 65535 extreme right)
 */
Joystick.prototype.getX = function() {
        return (this.ctl) ? this.ctl.x : Joystick.CENTER;
};

/**
 * Reads the controller's main stick y-axis.
 *
 * @return a value between 0 and 65535 (with 0 being extreme top and 65535 extreme bottom)
 */
Joystick.prototype.getY = function() {
        return (this.ctl) ? this.ctl.y : Joystick.CENTER;
};

/**
 * Reads the controller's designated A button.
 *
 * @return {@code true} if the button is pressed
 */
Joystick.prototype.getA = function() {
        return (this.ctl) ? this.ctl.a : false;
};

/**
 * Reads the controller's designated B button.
 *
 * @return {@code true} if the button is pressed
 */
Joystick.prototype.getB = function() {
        return (this.ctl) ? this.ctl.b : false;
};

/**
 * Reads the state of all the controller's non-directional buttons.
 *
 * @return the buttons represented as bits in an integer
 */
Joystick.prototype.getButtons = function() {
        return (this.ctl) ? this.ctl.buttons : 0;
};



/**
 * Reads multiple controller properties.
 *
 * @param prop array of property names
 * @param off offset into prop where the names start
 * @param len number of names to read
 * @return an array of joystick properties
 */
Joystick.prototype.read = function(prop, off, len) {
        switch (arguments.length) {
        case 0:
                return null;
        case 1:
                off = 0;
        case 2:
                len = prop.length - off;
        }
        var ret = [];
        for (var n = 0; n < len; n++) {
                switch (prop[off + n]) {
                case "x":
                        ret.push(this.getX());
                        break;
                case "y":
                        ret.push(this.getY());
                        break;
                case "a":
                        ret.push(this.getA());
                        break;
                case "b":
                        ret.push(this.getB());
                        break;
                case "buttons":
                        ret.push(this.getButtons());
                        break;
                default:
                        ret.push(0);
                }
        }
        return ret;
};

//****************************** Static Methods *****************************/

/**
 * Creates the browser dependent plug-in or ActiveX counterpart.
 */
Joystick.createPlugin = function() {
        var ctrlIE = document.createElement("object");
        if (ctrlIE) {
                try {
                        ctrlIE.classid = "CLSID:3AE9ED90-4B59-47A0-873B-7B71554B3C3E";
                        if (ctrlIE.setDevice(0) != null) {
                                /*
                                 * IE always returns a Boolean for this call, so any non-null
                                 * value is success at this point.
                                 */
                                return ctrlIE;
                        }
                } catch (e) {
                        /*
                         * Either we're not using IE or the plug-in is not installed,
                         * so ignore any exceptions and try the next method.
                         */
                }
        }
       
        var ctrlFF = document.createElement("embed");
        if (ctrlFF) {
                if (navigator && navigator.plugins) {
                        /*
                         * In order that users without the plug-in don't get a pop-up
                         * alerting them to missing plug-ins each, we search for the
                         * potential existence first.
                         */
                        var found = false;
                        for (var n = 0; n < navigator.plugins.length; n++) {
                                if (navigator.plugins[n].name.indexOf("Joystick") != -1) {
                                        found = true;
                                        break;
                                }
                        }
                        if (!found) {
                                return null;
                        }
                }
                try {
                        ctrlFF.type = "application/x-vnd.numfum-joystick";
                        ctrlFF.width  = 0;
                        ctrlFF.height = 0;
                        /*
                         * Before accessing the plug-in's script interface it needs to be
                         * added to the page. If the 'setDevice' call fails, the plug-in
                         * is assumed to either not be installed or not working in this
                         * browser, in which case it is removed in the catch.
                         */
                        document.body.appendChild(ctrlFF, document.body);
                        if (ctrlFF.setDevice(0) != null) {
                                /*
                                 * As with the code for IE, any non-null value is a
                                 * success.
                                 */
                                return ctrlFF;
                        }
                } catch (e) {
                        /*
                         * It's assumed at this point the plug-in is not installed.
                         */
                }
                /*
                 * If we've reached here something has gone wrong after adding the
                 * plug-in to the page, so we remove it.
                 */
                document.body.removeChild(ctrlFF);
        }
       
        return null;
};

/**
 * Contains the joystick wrapper instances used by register.
 */
Joystick.registered = [];

/**
 * Helper method for Flash (or other plug-ins) to create and manage Joystick
 * instances from a 'static' entry point.
 *
 * @param idx optional plug-in wrapper index
 * @return index by which the plug-in instance should be referred to in future calls
 */
Joystick.register = function(idx) {
        if (arguments.length == 0 || idx < 0) {
                var stick = new Joystick();
                if (stick) {
                        return Joystick.registered.push(stick) - 1;
                }
        } else {
                if (Joystick.registered[idx]) {
                        return idx;
                }
                var stick = new Joystick();
                if (stick) {
                        Joystick.registered[idx] = stick;
                        return idx;
                }
        }
        return -1;
};

/**
 * Helper method for Flash (or other plug-ins) to read mutliple controller
 * properties in one call from a static entry point. The work of the call is
 * handled by the three parameter read().
 *
 * @param idx joystick instance index from register()
 * @return array of controller parameters
 */
Joystick.read = function(idx /*followed by variable args*/) {
        var stick = Joystick.registered[idx];
        if (stick) {
                return stick.read(arguments, 1, arguments.length - 1);
        }
        return null;
}