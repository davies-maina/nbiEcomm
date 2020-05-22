<div class="form-group">
                  <label>Select category level</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id"  id="category_id">
                   {{--  @if(isset($productData->category['id']))
                  <option  disabled @if (isset($productData->category['parent_id']) && $productData->category['parent_id']==0)
                        selected=""
                    @endif>Main Category</option>
                    @endif --}}
                   
                    @if (!empty($getCategories))
                        @foreach ($getCategories as $category)
                  <option value="{{$category['id']}}" 
                  @if (isset($productData->category['id']) && $productData->category['id']==$category['id'])
                  
                      selected
                      
                  @endif
                  
                  >{{$category['category_name']}}</option>

                                @if (!empty($category['subcategories']))
                                    @foreach ($category['subcategories'] as $subcategory)
                  <option value="{{$subcategory['id']}}">&nbsp;&raquo;&nbsp;{{$subcategory['category_name']}}</option>
                        @endforeach
                                @endif
                       
                         @endforeach
                    @endif
                            
                   
                  </select>
                </div>