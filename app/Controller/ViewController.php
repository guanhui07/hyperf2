<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\View\RenderInterface;
use App\Request\FooRequest;
/**
 * @AutoController
 */
class ViewController  extends AbstractController
{
    public function index()
    {
        return $this->view->render('index', ['name' => 'Hyperf']);
    }

    /**
     * 验证器
     * @param FooRequest $request
     */
    public function index2(FooRequest $request)
    {
        // 传入的请求通过验证...

        // 获取通过验证的数据...
        $validated = $request->validated();
        return 'test';
    }

    public function example(\League\Flysystem\Filesystem $filesystem)
    {
        // Process Upload 文件系统测试
        $file = $this->request->file('upload');
        $stream = fopen($file->getRealPath(), 'r+');
        $filesystem->writeStream(
            'uploads/'.$file->getClientFilename(),
            $stream
        );
        fclose($stream);

        // Write Files
        $filesystem->write('path/to/file.txt', 'contents');

        // Add local file
        $stream = fopen('local/path/to/file.txt', 'r+');
        $result = $filesystem->writeStream('path/to/file.txt', $stream);
        if (is_resource($stream)) {
            fclose($stream);
        }

        // Update Files
        $filesystem->update('path/to/file.txt', 'new contents');

        // Check if a file exists
        $exists = $filesystem->has('path/to/file.txt');

        // Read Files
        $contents = $filesystem->read('path/to/file.txt');

        // Delete Files
        $filesystem->delete('path/to/file.txt');

        // Rename Files
        $filesystem->rename('filename.txt', 'newname.txt');

        // Copy Files
        $filesystem->copy('filename.txt', 'duplicate.txt');

        // list the contents
        $filesystem->listContents('path', false);
    }
}
