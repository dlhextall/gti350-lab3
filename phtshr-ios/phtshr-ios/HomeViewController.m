//
//  HomeViewController.m
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import "HomeViewController.h"
#import "HomePhotoFeedViewCell.h"
#import "Webservices.h"
#import "MyPhoto.h"

@interface HomeViewController ()

@end

@implementation HomeViewController

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    // Do any additional setup after loading the view.
    self.photoFeed = [Webservices getPhotoFeed];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (NSInteger)collectionView:(UICollectionView *)view numberOfItemsInSection:(NSInteger)section {
    return [self.photoFeed count];
}

- (NSInteger)numberOfSectionsInCollectionView: (UICollectionView *)collectionView {
    return 1;
}

- (UICollectionViewCell *)collectionView:(UICollectionView *)cv cellForItemAtIndexPath:(NSIndexPath *)indexPath {
    HomePhotoFeedViewCell *cell = [cv dequeueReusableCellWithReuseIdentifier:@"homePhotoFeed" forIndexPath:indexPath];

    MyPhoto *currentPhoto = [self.photoFeed objectAtIndex:indexPath.row];
    cell.image.image = currentPhoto;
    cell.imageTitle.text = currentPhoto.description;
    
    return cell;
}

- (void)searchBar:(UISearchBar*)searchBar textDidChange:(NSString*)text {
    if (text.length > 0) {
        self.photoFeed = [Webservices getPhotoFeedWithTags:text];
    } else {
        self.photoFeed = [Webservices getPhotoFeed];
    }
    
    [self.collectionViewPhotoFeed reloadData];
}

- (void)searchBarSearchButtonClicked:(UISearchBar *)searchBar {
    [searchBar resignFirstResponder];
    [self.view endEditing:YES];
}

- (void)searchBarCancelButtonClicked:(UISearchBar *)searchBar {
    [searchBar resignFirstResponder];
    [self.view endEditing:YES];
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender
{
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end
