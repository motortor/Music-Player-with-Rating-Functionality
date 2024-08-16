const http = require('http');
const fs = require('fs');
const url = require('url');
const qs = require('querystring');

const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url);
    const pathname = parsedUrl.pathname;

    if (pathname === '/saveRating' && req.method === 'POST') {
        let body = '';

        req.on('data', (chunk) => {
            body += chunk;
        });

        req.on('end', () => {
            const ratingValue = qs.parse(body).rating;

            // 追加评分到 fitness.txt 文件
            fs.appendFile('fitness.txt', ratingValue + '\n', (err) => {
                if (err) throw err;
                console.log('Rating saved:', ratingValue);
                res.end('Rating saved!');
            });
        });
    } else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('Not Found');
    }
});

const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}/`);
});
