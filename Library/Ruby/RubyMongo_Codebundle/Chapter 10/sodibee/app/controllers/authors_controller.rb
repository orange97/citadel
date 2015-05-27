class AuthorsController < ApplicationController
  # GET /authors
  def index
    @authors = Author.all.includes(:books)
  end

  # GET /authors/new
  def new
    @author = Author.new
    @author.build_address
    @author.books.build
  end

  # POST /authors
  def create
    @author = Author.new(params[:author])
    @author.save!
    redirect_to authors_path, notice: "Author created successfully"

    rescue
      render :new      
  end

  # GET /authors/:id/edit
  def edit
    @author = Author.find(params[:id])
    @author.build_address unless @author.address
    @author.books.build if @author.books.empty?
  end

  # PUT /authors/:id
  def update
    @author = Author.find(params[:id])
    if @author.update_attributes(params[:author])
      redirect_to authors_path, notice: "Author updated successfully"
    else
      render :edit
    end
  end
end
