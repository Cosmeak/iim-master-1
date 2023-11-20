//
//  BooksView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct BooksView: View {
    @State var books = []
    
    var body: some View {
        NavigationView(content: {
            VStack(content: {
                // For loop to display all books added
                Text("Books here")
            })
            .navigationTitle("Books")
            .toolbar {
                Button {
                    // Action
                } label: {
                    Image(systemName: "plus")
                }
            }
            // .sheet(isPresented: $books, content: {
                //
            // }
        })
    }
}

#Preview {
    BooksView()
}
