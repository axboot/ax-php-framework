var fnObj = {};
var ACTIONS = axboot.actionExtend(fnObj, {
    PAGE_SEARCH: function (caller, act, data) {
        var searchData = caller.searchView.getData();
        axboot.ajax({
            type: "GET",
            url: ["manual"],
            data: caller.searchView.getData(),
            callback: function (res) {
                caller.treeView01.setData(searchData, res.list);
            }
        });
        return false;
    },
    PAGE_SAVE: function (caller, act, data) {

        var obj = {
            list: caller.treeView01.getData(),
            deletedList: caller.treeView01.getDeletedList()
        };

        axboot
            .call({
                type: "PUT",
                url: ["manual"],
                data: JSON.stringify(obj),
                callback: function () {
                    caller.treeView01.clearDeletedList();
                    axToast.push("목차가 저장 되었습니다");
                }
            })
            .done(function () {
                var data = caller.formView01.getData();

                if (data.manualId) {
                    axboot.ajax({
                        type: "PUT",
                        url: ["manual", "detail"],
                        data: JSON.stringify(data),
                        callback: function (res) {
                            axToast.push("매뉴얼 내용이 저장 되었습니다");
                            ACTIONS.dispatch(ACTIONS.PAGE_SEARCH);
                        }
                    })
                    ;
                } else {
                    ACTIONS.dispatch(ACTIONS.PAGE_SEARCH);
                }

            });

    },
    TREEITEM_CLICK: function (caller, act, data) {
        if (typeof data.manualId === "undefined") {
            caller.formView01.clear();
            if (confirm("신규 생성된 목차는 저장 후 편집 할수 있습니다. 지금 저장 하시겠습니까? (저장 후에 다시 선택해주세요)")) {
                ACTIONS.dispatch(ACTIONS.PAGE_SAVE);
            }
            return;
        }

        axboot.ajax({
            type: "GET",
            url: ["manual", data.manualId],
            data: "",
            callback: function (res) {
                caller.formView01.setData(res);
            }
        });
    },
    TREEITEM_DESELECTE: function (caller, act, data) {

    },
    TREE_ROOTNODE_ADD: function (caller, act, data) {
        caller.treeView01.addRootNode();
    },
    MANUAL_GROUP_MNG: function (caller, act, data) {
        axboot.modal.open({
            modalType: "COMMON_CODE_MODAL",
            param: "GROUP_CD=MANUAL_GROUP&GROUP_NM=매뉴얼 그룹",
            modalSendData: function () {
                return {};
            },
            callback: function (data) {
                if (data == "saved") {
                    if (confirm("매뉴얼 그룹 정보가 변경 되었습니다. 페이지를 새로고침 하시겠습니까?")) {
                        window.location.reload();
                    }
                }
                this.close();
            }
        });
    },
    dispatch: function (caller, act, data) {
        var result = ACTIONS.exec(caller, act, data);
        if (result != "error") {
            return result;
        } else {
            // 직접코딩
            return false;
        }
    }
});
var CODE = {};

// fnObj 기본 함수 스타트와 리사이즈
fnObj.pageStart = function () {
    var _this = this;
    axboot
        .call({
            type: "GET", url: ["commonCodes"], data: {groupCd: "MANUAL_GROUP", useYn: "Y"},
            callback: function (res) {
                var manualGroup = [];
                res.list.forEach(function (n) {
                    manualGroup.push({
                        value: n.code, text: n.name + "(" + n.code + ")",
                        grpAuthCd: n.code, grpAuthNm: n.name,
                        data: n
                    });
                });
                this.authGroup = manualGroup;
            }
        })
        .done(function () {
            CODE = this; // this는 call을 통해 수집된 데이터들.

            _this.pageButtonView.initView();
            _this.searchView.initView();
            _this.treeView01.initView();
            _this.formView01.initView();

            ACTIONS.dispatch(ACTIONS.PAGE_SEARCH);
        });
};

fnObj.pageResize = function () {
    setTimeout(function () {
        fnObj.formView01.resize();
    }, 100);
};

fnObj.pageButtonView = axboot.viewExtend({
    initView: function () {
        axboot.buttonClick(this, "data-page-btn", {
            "search": function () {
                ACTIONS.dispatch(ACTIONS.PAGE_SEARCH);
            },
            "save": function () {
                ACTIONS.dispatch(ACTIONS.PAGE_SAVE);
            }
        });
    }
});

//== view 시작
/**
 * searchView
 */
fnObj.searchView = axboot.viewExtend(axboot.searchView, {
    initView: function () {
        this.target = $(document["searchView0"]);
        this.target.attr("onsubmit", "return ACTIONS.dispatch(ACTIONS.PAGE_SEARCH);");
        this.manualGrpCd = $("#manualGrpCd");

        axboot.buttonClick(this, "data-search-view-0-btn", {
            "manualGroupMng": function () {
                ACTIONS.dispatch(ACTIONS.MANUAL_GROUP_MNG);
            }
        });
    },
    getData: function () {
        return {
            pageNumber: this.pageNumber,
            pageSize: this.pageSize,
            manualGrpCd: this.manualGrpCd.val()
        }
    }
});


/**
 * treeView
 */
fnObj.treeView01 = axboot.viewExtend(axboot.treeView, {
    param: {},
    deletedList: [],
    newCount: 0,
    addRootNode: function () {
        var _this = this;
        var nodes = _this.target.zTree.getSelectedNodes();
        var treeNode = nodes[0];

        // root
        treeNode = _this.target.zTree.addNodes(null, {
            id: "_isnew_" + (++_this.newCount),
            pId: 0,
            name: "새 목차",
            __created__: true,
            manualGrpCd: _this.param.manualGrpCd
        });

        if (treeNode) {
            _this.target.zTree.editName(treeNode[0]);
        }
        fnObj.treeView01.deselectNode();
    },
    initView: function () {
        var _this = this;

        axboot.buttonClick(this, "data-tree-view-01-btn", {
            "add": function () {
                ACTIONS.dispatch(ACTIONS.TREE_ROOTNODE_ADD);
            }
        });

        this.target = axboot.treeBuilder($('[data-z-tree="tree-view-01"]'), {
            view: {
                dblClickExpand: false,
                addHoverDom: function (treeId, treeNode) {
                    var sObj = $("#" + treeNode.tId + "_span");
                    if (treeNode.editNameFlag || $("#addBtn_" + treeNode.tId).length > 0) return;
                    var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
                        + "' title='add node' onfocus='this.blur();'></span>";
                    sObj.after(addStr);
                    var btn = $("#addBtn_" + treeNode.tId);
                    if (btn) {
                        btn.bind("click", function () {
                            _this.target.zTree.addNodes(
                                treeNode,
                                {
                                    id: "_isnew_" + (++_this.newCount),
                                    pId: treeNode.id,
                                    name: "새 목차",
                                    __created__: true,
                                    manualGrpCd: _this.param.manualGrpCd
                                }
                            );
                            _this.target.zTree.selectNode(treeNode.children[treeNode.children.length - 1]);
                            _this.target.editName();
                            fnObj.treeView01.deselectNode();
                            return false;
                        });
                    }
                },
                removeHoverDom: function (treeId, treeNode) {
                    $("#addBtn_" + treeNode.tId).unbind().remove();
                }
            },
            edit: {
                enable: true,
                editNameSelectAll: true
            },
            callback: {
                beforeDrag: function () {
                    //return false;
                },
                onClick: function (e, treeId, treeNode, isCancel) {
                    ACTIONS.dispatch(ACTIONS.TREEITEM_CLICK, treeNode);
                },
                onRename: function (e, treeId, treeNode, isCancel) {
                    treeNode.__modified__ = true;
                },
                onRemove: function (e, treeId, treeNode, isCancel) {
                    if (!treeNode.__created__) {
                        treeNode.__deleted__ = true;
                        _this.deletedList.push(treeNode);
                    }
                }
            }
        }, []);
    },
    setData: function (_searchData, _tree) {
        this.param = $.extend({}, _searchData);
        this.target.setData(_tree);
    },
    getData: function () {
        var _this = this;
        var tree = this.target.getData();

        var convertList = function (_tree) {
            var _newTree = [];
            _tree.forEach(function (n, nidx) {
                var item = {};
                if (n.__created__ || n.__modified__) {
                    item = {
                        __created__: n.__created__,
                        __modified__: n.__modified__,
                        manualId: n.manualId,
                        manualGrpCd: _this.param.manualGrpCd,
                        manualNm: n.name,
                        parentId: n.parentId,
                        sort: nidx,
                        progCd: n.progCd,
                        level: n.level
                    };
                } else {
                    item = {
                        manualId: n.manualId,
                        manualGrpCd: n.manualGrpCd,
                        manualNm: n.name,
                        parentId: n.parentId,
                        sort: nidx,
                        progCd: n.progCd,
                        level: n.level
                    };
                }
                if (n.children && n.children.length) {
                    item.children = convertList(n.children);
                }
                _newTree.push(item);
            });
            return _newTree;
        };
        var newTree = convertList(tree);
        return newTree;
    },
    getDeletedList: function () {
        return this.deletedList;
    },
    clearDeletedList: function () {
        this.deletedList = [];
        return true;
    },
    updateNode: function (data) {
        var treeNodes = this.target.getSelectedNodes();
        if (treeNodes[0]) {
            treeNodes[0].progCd = data.progCd;
        }
    },
    deselectNode: function () {
        ACTIONS.dispatch(ACTIONS.TREEITEM_DESELECTE);
    }
});

/**
 * formView01
 */
fnObj.formView01 = axboot.viewExtend(axboot.formView, {
    getDefaultData: function () {
        return $.extend({}, axboot.formView.defaultData, {});
    },
    initView: function () {
        var _this = this;

        this.mask = new ax5.ui.mask({
            theme: "form-mask",
            target: $('#split-panel-form'),
            content: '좌측 목차를 선택해주세요.'
        });
        this.mask.open();

        this.manualGroup = CODE.manualGroup;

        this.target = $("#formView01");
        this.model = new ax5.ui.binder();
        this.model.setModel(this.getDefaultData(), this.target);
        this.modelFormatter = new axboot.modelFormatter(this.model); // 모델 포메터 시작

        this.editor = CKEDITOR.replace('editor1', {
            language: 'korean',
            extraPlugins: 'uploadimage,filemanager,notification',
            filebrowserBrowseUrl: CONTEXT_PATH + '/ckeditor/fileBrowser?targetType=CKEDITOR&targetId=' + menuId,
            filebrowserWindowWidth: '960',
            filebrowserWindowHeight: '600',
            imageUploadUrl: CONTEXT_PATH + '/ckeditor/uploadImage?&targetId=' + menuId,
            removePlugins: 'resize',
            removeButtons: 'Underline,Subscript,Superscript,About',
            toolbarGroups: [
                {name: 'clipboard', groups: ['undo', 'clipboard']},
                {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                {name: 'links', groups: ['links']},
                {name: 'insert', groups: ['others', 'insert']},
                {name: 'forms', groups: ['forms']},
                {name: 'tools', groups: ['tools']},
                {name: 'document', groups: ['mode', 'document', 'doctools']},
                '/',
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                {name: 'styles', groups: ['styles']},
                {name: 'colors', groups: ['colors']}
            ]
        });

        this.editor.once('instanceReady', function () {
        });

        this.editor.on('notificationShow', function (evt) {
            evt.cancel();
        });

        this.editor.on('notificationUpdate', function (evt) {
            evt.cancel();
        });

        this.resize();
        this.initEvent();

        axboot.buttonClick(this, "data-form-view-01-btn", {
            "form-clear": function () {
                ACTIONS.dispatch(ACTIONS.FORM_CLEAR);
            }
        });
    },
    initEvent: function () {
        var _this = this;
    },
    getData: function () {
        var data = this.modelFormatter.getClearData(this.model.get()); // 모델의 값을 포멧팅 전 값으로 치환.
        return data;
    },
    setData: function (data) {
        this.mask.close();
        $.extend(true, data, this.getDefaultData());
        this.model.setModel(data);
        this.resize();
    },
    resize: function () {
        try {
            this.editor.resize('100%', $('[data-fit-height-content="form-view-01"]').height() - 10, false);
        } catch (e) {
        }
    },
    clear: function () {
        this.mask.open();
        this.model.setModel(this.getDefaultData());
    }
});