/**
 * Minified by jsDelivr using Terser v5.15.1.
 * Original file: /npm/qrcode@1.5.3/lib/browser.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const canPromise=require("./can-promise"),QRCode=require("./core/qrcode"),CanvasRenderer=require("./renderer/canvas"),SvgRenderer=require("./renderer/svg-tag.js");function renderCanvas(e,r,n,o,t){const a=[].slice.call(arguments,1),d=a.length,i="function"==typeof a[d-1];if(!i&&!canPromise())throw new Error("Callback required as last argument");if(!i){if(d<1)throw new Error("Too few arguments provided");return 1===d?(n=r,r=o=void 0):2!==d||r.getContext||(o=n,n=r,r=void 0),new Promise((function(t,a){try{const a=QRCode.create(n,o);t(e(a,r,o))}catch(e){a(e)}}))}if(d<2)throw new Error("Too few arguments provided");2===d?(t=n,n=r,r=o=void 0):3===d&&(r.getContext&&void 0===t?(t=o,o=void 0):(t=o,o=n,n=r,r=void 0));try{const a=QRCode.create(n,o);t(null,e(a,r,o))}catch(e){t(e)}}exports.create=QRCode.create,exports.toCanvas=renderCanvas.bind(null,CanvasRenderer.render),exports.toDataURL=renderCanvas.bind(null,CanvasRenderer.renderToDataURL),exports.toString=renderCanvas.bind(null,(function(e,r,n){return SvgRenderer.render(e,n)}));
//# sourceMappingURL=/sm/cbfe5d59e9e02d2fdaaee67bf232f9465b0e73c557e0eda9a442519059316ae5.map