
import * as PIXI from 'pixi.js';

let createAnimation = () => {

    let can = document.getElementById("canvas");
    if (!can) return;

    function getRnd(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }


    const app = new PIXI.Application({
        width: 1000, height: 800, transparent: true, resolution: window.devicePixelRatio || 1,
    });

    document.getElementById("canvas").appendChild(app.view);

    // transparent: true, backgroundColor: 0x1099bb,


    const container = new PIXI.Container();


    // Create a new texture
    const texture = PIXI.Texture.from('img/computer.png');
    let computer = new PIXI.Sprite(texture);

    // computer.x = app.screen.width / 2;
    // computer.y = app.screen.height / 2;
    computer.width = 815;
    computer.height = 592;

    container.x = 0;
    container.y = 200;

    container.width = 815;
    container.height = 592;

    // Center bunny sprite in local container coordinates
    container.pivot.x = container.width / 2;
    container.pivot.y = container.height / 2;

    container.addChild(computer);

    app.stage.addChild(container);


    // Text
    const style = new PIXI.TextStyle({
        fontFamily: 'Arial',
        fontSize: 16,
        // fontStyle: 'italic',
        // fontWeight: 'bold',
        fill: '#2667FF', // gradient
        // stroke: '#2667FF',
        // strokeThickness: 5,
        // dropShadow: true,
        // dropShadowColor: '#000000',
        // dropShadowBlur: 4,
        // dropShadowAngle: Math.PI / 6,
        // dropShadowDistance: 6,
        // wordWrap: true,
        // wordWrapWidth: 440,
        // lineJoin: 'round'
    });

    // const richText = new PIXI.Text('A', style);
    // richText.x = 50;
    // richText.y = 220;

    // app.stage.addChild(richText);
    var blurFilter1 = new PIXI.filters.BlurFilter();



    // const graphics = new PIXI.Graphics();

    // // Rectangle
    // graphics.beginFill(0xDE3249);
    // graphics.drawRect(160, 340, 10, 10);
    // graphics.endFill();


    // // Rectangle
    // graphics.beginFill(0xDE3249);
    // graphics.drawRect(230, 640, 10, 10);
    // graphics.endFill();

    // app.stage.addChild(graphics);







    // const graphics = new PIXI.Graphics();

    // // Rectangle
    // graphics.beginFill(0xDE3249);
    // graphics.drawRect(600, 40, 10, 10);
    // graphics.endFill();


    // // Rectangle
    // graphics.beginFill(0xDE3249);
    // graphics.drawRect(900, 600, 10, 10);
    // graphics.endFill();

    // app.stage.addChild(graphics);



    let start = [[100, 230], [350, 680]];
    let end = [[600, 900], [40, 600]];

    let words = [':h', '&', 'this', '$', '{e}', '(0)', 'if', '!&'];
    let letters = [];

    function getSqrt(from, to) {
        return from + (to - from);
    }

    function getSqrt2(from, to, pos) {
        return from + (to - from) * pos;
    }

    // console.log(getSqrt2(200, 100, 0.2));

    function getPos(start, end, process) {
        let x, y;

        // let st = 

        return {
            x,
            y,
        }
    }



    function render() {

        for (let i = 0; i < words.length; i++) {
            const container = new PIXI.Container();
            container.rand = Math.random();
            container.rand1 = Math.random();
            container.rand2 = Math.random();

            container.obj = {
                sx: getSqrt2(start[0][0], start[0][1], container.rand),
                sy: getSqrt2(start[1][0], start[1][1], container.rand),
                ex: getSqrt2(getRnd(400, 700), getRnd(700, 900), container.rand),
                ey: getSqrt2(getRnd(0, 100), getRnd(500, 700), container.rand)
            };

            // console.log(container.obj);

            const richText = new PIXI.Text(words[i], style);
            // container.x = container.obj.sx;
            // container.y = container.obj.sy;
            container.addChild(richText);

            container.x = getSqrt2(container.obj.sx, container.obj.ex, container.rand1);
            container.y = getSqrt2(container.obj.sy, container.obj.ey, container.rand1);

            app.stage.addChild(container);
            letters.push(container);
        }
    }



    for (let i = 0; i < 30; i++) {
        render()
    }



    function runTextWay(x1, y1, x2, y2) {
        return Math.sqrt(Math.pow((x1 - x2), 2) + Math.pow((y1 - y2), 2));
    }

    // console.log(runTextWay(0, 0, 200, 100));



    let count = 0.1;

    app.ticker.add(() => {
        // count += 0.005;

        letters.forEach(thing => {
            // thing.clear();
            // thing.lineStyle(10, 0xff0000, 1);
            // thing.beginFill(0xffFF00, 0.5);

            let st = Math.sin(thing.rand1);

            if (thing.rand1 >= 1) {
                thing.rand1 = 0;
                // st = Math.sin(thing.rand1);
            }

            const t = thing.rand1; //Math.abs(st);

            // console.log(t, thing.rand1);

            thing.skew.x = 30;
            thing.skew.y = 30;
            thing.scale.x = t + 0.1;
            thing.scale.y = t + 0.1;

            let d = 0.8;
            if (t > d) {
                thing.alpha = 1 - ((t - d) / (1 - d));
            } else {
                thing.alpha = 1;
            }

            // thing.rotation = t * 360;

            thing.x = getSqrt2(thing.obj.sx, thing.obj.ex, t);
            thing.y = getSqrt2(thing.obj.sy, thing.obj.ey, t);

            thing.rand1 += 0.0005;

            // thing.rotation = 36 * t;
        })
    });

}



export default createAnimation;