; (function (global, $) {
    // Normal function
    var Greetr = function (firstname, lastname, language) {
        return new Greetr.init(firstname, lastname, language);
    };

    var supportedLangs = ["en", "es"];

    var greetings = {
        en: "Hello",
        es: "Hola",
    };

    var formalGreetings = {
        en: "Greetings",
        es: "Saludos",
    };

    var loMessage = {
        en: "logged in",
        es: "Inicio sesion",
    };

    // normal function prototype
    Greetr.prototype = {
        fullName: function () {
            return this.firstname + " " + this.lastname;
        },
        validate: function () {
            if (supportedLangs.indexOf(this.language) === -1) {
                throw new Error("Invalid Language");
            }
        },
        greeting: function () {
            return greetings[this.language] + " " + this.firstname + "!";
        },
        formalGreeting: function () {
            return formalGreetings[this.language] + ", " + this.fullName();
        },
        greet: function (formal) {
            var msg;

            if (formal) {
                msg = this.formalGreeting();
            } else {
                msg = this.greeting();
            }

            if (console) {
                console.log(msg);
            }

            return this;
        },
        log: function () {
            if (console) {
                console.log(loMessage[this.language] + " " + this.fullName());
            }
            return this;
        },
        setLang: function (lang) {
            this.language = lang;
            this.validate();
            return this;
        },
        HTMLGreeting: function (selector, formal) {
            if (!$) {
                throw 'jquery not loaded';
            }
            if (!selector) {
                throw 'Missing jQuery selector';
            }

            var msg;

            if (formal) {
                msg = this.formalGreeting();
            } else {
                msg = this.greeting();
            }

            $(selector).html(msg);

            return this;
        }
    };

    // function constructor
    Greetr.init = function (firstname, lastname, language) {
        var self = this;

        self.firstname = firstname || "";
        self.lastname = lastname || "";
        self.language = language || "en";
    };

    Greetr.init.prototype = Greetr.prototype;

    global.Greetr = global.G$ = Greetr;
})(window, jQuery);
