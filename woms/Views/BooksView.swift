//
//  BooksView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct BooksView: View {
    @StateObject var booksViewModel = BooksViewModel()
    
    var body: some View {
        NavigationView(content: {
            VStack(content: {
                List {
                    ForEach (booksViewModel.books) { book in
                        Text(book.title)
                        Button {
                            booksViewModel.removeBook(book)
                        } label: {
                            Image(systemName: "trash.fill")
                                .foregroundStyle(Color.red)
                        }
                    }
                }
            })
            .navigationTitle("Books")
            .toolbar {
                Button {
                    booksViewModel.showingNewBookView = true
                } label: {
                    Image(systemName: "plus")
                }
            }
            .sheet(isPresented: $booksViewModel.showingNewBookView, content: {
                NewBookView(newBookViewShowed: $booksViewModel.showingNewBookView, books: $booksViewModel.books)
            })
        })
    }
}

#Preview {
    BooksView()
}
