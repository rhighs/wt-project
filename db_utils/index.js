import fetch from "node-fetch";
import fs from "fs";

const getSkins = async (offset, limit) => {
    let buildUrl = (offset) =>
        `https://inventories.cs.money/5.0/load_bots_inventory/730?buyBonus=40&isStore=true&limit=${limit}&maxPrice=10000&minPrice=1&offset=${offset}&withStack=true`;
    let a = fetch(buildUrl(offset))
        .then(res => {console.log(res); return res.json();});
    return a;
};

const main = async () => {
    let step = 60;
    let foundItems = [];

    let i = 0;
    while (true) {
        i += step;
        try {
            console.log("Searching offset =", i);
            foundItems = [...foundItems, ...(await getSkins(i, step)).items];
        } catch (_) {
            fs.writeFileSync("test.json", JSON.stringify(foundItems));
            break;
        }
    }

};

main();

/*
const smParser = new SteamMarketParser({appId: 730, currency: Currency.USD});

(async () => {
    const data = await smParser.getMarketData('Five-SeveN | Hyper Beast (Field-Tested)');
})();
*/
