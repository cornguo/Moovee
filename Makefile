subdirs=gh2012 packjs

.PHONY: all
all: func.test.js func.js build_subs

.PHONY: build_subs
build_subs:
	@for d in $(subdirs); do make -C $$d; done

.PHONY: clean
clean:
	@for d in $(subdirs); do make -C $$d $@; done

func.js: build_subs devel/func.js
	./packjs.sh

func.test.js: build_subs devel/func.test.js
	./packjs.test.sh
