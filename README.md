FLOW.Logger
===========

uses doctrine/loggable to log changes to TYPO3.Flow domain objects

How to
======

```
use Gedmo\Mapping\Annotation as Gedmo;
```

annotate the class, which should be logged with:

```
@Gedmo\Loggable(logEntryClass="KayStrobach\Logger\Domain\Model\LogEntry")
```

annotate the property to watch for changes with:

```
@Gedmo\Versioned
```

Show changes
============

This package also contains a controller to view the changes
