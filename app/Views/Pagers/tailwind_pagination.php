<?php $pager->setSurroundCount(2); ?>

<nav aria-label="Pagination" class="flex items-center justify-between">
    <div class="hidden sm:block">
        <p class="text-sm text-slate-500">
            Menampilkan <span class="font-medium"><?= $pager->getCurrentPageNumber() ?></span> dari <span class="font-medium"><?= $pager->getPageCount() ?></span> halaman
        </p>
    </div>
    <div class="flex flex-1 justify-between sm:justify-end gap-2">
        <?php if ($pager->hasPrevious()) : ?>
            <a href="<?= $pager->getPreviousPage() ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                Previous
            </a>
        <?php else : ?>
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-400 bg-slate-50 border border-slate-200 rounded-lg cursor-not-allowed">
                Previous
            </span>
        <?php endif ?>

        <div class="hidden md:flex gap-1">
            <?php foreach ($pager->links() as $link) : ?>
                <a href="<?= $link['uri'] ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors <?= $link['active'] ? 'bg-primary-600 text-white' : 'text-slate-700 bg-white border border-slate-300 hover:bg-slate-50' ?>">
                    <?= $link['title'] ?>
                </a>
            <?php endforeach ?>
        </div>

        <?php if ($pager->hasNext()) : ?>
            <a href="<?= $pager->getNextPage() ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                Next
            </a>
        <?php else : ?>
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-400 bg-slate-50 border border-slate-200 rounded-lg cursor-not-allowed">
                Next
            </span>
        <?php endif ?>
    </div>
</nav>