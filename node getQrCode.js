const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch();
  const page = await browser.newPage();
  await page.goto('https://web.whatsapp.com');

  // Tunggu hingga elemen QR code muncul
  await page.waitForSelector('canvas');

  // Ambil screenshot elemen QR code
  const qrCode = await page.$('canvas');
  await qrCode.screenshot({ path: 'qr_code.png' });

  await browser.close();
})();